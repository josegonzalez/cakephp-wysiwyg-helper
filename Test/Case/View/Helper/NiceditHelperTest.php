<?php
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('WysiwygHelper', 'Wysiwyg.View/Helper');

class NiceditHelperTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();

		$Controller = new Controller();
		$View = new View($Controller);
		$this->Wysiwyg = new WysiwygHelper($View, array('_editor' => 'Nicedit'));
	}

	public function testCorrectHelperSet() {
		$this->assertEquals('Nicedit', $this->Wysiwyg->helper);
	}

	public function testInputNoSettings() {
		$expected = '<div class="input text"><label for="foo">Foo</label><input name="data[foo]" type="text" id="foo"/></div><script type="text/javascript">bkLib.onDomLoaded(function() { new nicEditor({"iconsPath":"\/js\/nicedit\/nicEditorIcons.gif"}).panelInstance(\'foo\'); });</script>';
		$this->assertEquals($expected, $this->Wysiwyg->input('foo'));
	}

	public function testTextareaNoSettings() {
		$expected = '<textarea name="data[foo]" id="foo"></textarea><script type="text/javascript">bkLib.onDomLoaded(function() { new nicEditor({"iconsPath":"\/js\/nicedit\/nicEditorIcons.gif"}).panelInstance(\'foo\'); });</script>';
		$this->assertEquals($expected, $this->Wysiwyg->textarea('foo'));
	}

	public function tearDown() {
		parent::tearDown();
	}
}
