<?php 
	namespace Main\Filter; 

	use Zend\InputFilter\InputFilter,
		Zend\Filter\File\RenameUpload,
		Zend\Validator\File\IsImage,
		Zend\Validator\File\ImageSize,
		Zend\Validator\File\Size, 
		Zend\Validator\File\Extension;


	/**
	* EditFilter
	*/
	class EditFilter extends InputFilter
	{
		
		function __construct()
		{
			$this->add([
				"name" => "thumbnail",
				"required" => false,
				"validators" => [
					[
						"name" => "ImageSize",
						"options" => [
							"minWidth" => 400,
							"minHeight" => 300
						]
					],
					[
						"name" => Size::class,
						"options" => [
							"max" => "5MB",
							"messages" => [
								"fileSizeTooBig" =>  $translator->translate(_("Макс размер фотографии 5MB"))
							]
						]
					],					
					[
						"name" => Extension::class,
						"options" => [
							"extension" => ["jpeg","png","JPG","JPEG","jpg","PNG"],
							"messages" => [
								"fileExtensionFalse" =>  $translator->translate(_("Фотогрфия должна быть в формате JPG,PNG"))
							]
 						]
					]
				]
			]);
		}
	}

 ?>