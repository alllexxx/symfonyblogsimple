<?php

namespace A2x\BlogBundle\Event;
use A2x\BlogBundle\Entity\Post;
use Symfony\Component\EventDispatcher\Event;
/**
* 
*/
class PostEvent extends Event
{
	
	private $post;
	public function __construct(Post $post)
	{
		$this->post=$post;
	}

	public function getPost()
	{
		return $this->post;
	}
}