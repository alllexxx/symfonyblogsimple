<?php
namespace A2x\BlogBundle\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

//use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use A2x\BlogBundle\Entity\Post;
use A2x\BlogBundle\A2xBlogEvent;
use A2x\BlogBundle\Event\PostEvent;

class FlashListener implements EventSubscriberInterface
{

	private $session;
	public function __construct(SessionInterface $session)
	{
		$this->session=$session;
	}
	public static function getSubscribedEvents()
	{
		return [
			A2xBlogEvent::POST_CREATED=>'onFlash',
			A2xBlogEvent::POST_UPDATED=>'onFlash',
			A2xBlogEvent::POST_DELETED=>'onFlash',
		];
	}

	public function onFlash(PostEvent $e)
	{
		$post=$e->getPost();

		$this->session->getFlashBag()->add('success',sprintf('Запись %s успешно добавлена.', $post->getTitle()));
		
		//$this->session->getFlashBag->add('success',sprintf('Запись %s успешно добавлена.', $post->getTitle()));
	}

}