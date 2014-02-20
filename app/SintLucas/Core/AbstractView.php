<?php namespace SintLucas\Core;

abstract class AbstractView {

	/**
	 * Render the view.
	 *
	 * @return string
	 */
	abstract public function render();

	/**
	 * Get the view as a string.
	 *
	 * @return string
	 */
	public function __toString()
	{
		try {
			return (string) $this->render();
		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}

}