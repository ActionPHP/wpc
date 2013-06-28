<?php

	class CreateClass
	{

		public function create()
		{
			$classes = array(

					'address',
					'shipping',
					'checkout',
					'cart',
					'customer',
					'product',
					'category',
					'tag',
					'email',
					'letter',
					'receipt',
					'order',
					'translate',
					'calculator',
					'membership',
					'theme',
					'template',
					'listing',
					'list',
					'review',
					'captcha',
					'upsell',
					'seo',
					'weight',
					'discount',
					'coupon',
					'export',
					'analytics',
					'import',
					'refund',
					'options',
					'settings',
					'account',
					'transaction'

				);

			
			foreach ($classes as $class) {
				
				$this->create_file($class);
			}

		}

		public function create_file($class_name)
		{
			$file_name = 'class-' . $class_name . '.php';
			$file_handle = fopen($file_name, 'w');
			$file_content = $this->file_content($class_name);
			fwrite($file_handle, $file_content);
			fclose($file_handle);
			$this->pre($file_content);
			$this->pre('Created file: ' . $file_name);
		}

		public function file_content($class_name)
		{

			$prefix = 'WPCart';
			$class_name = ucfirst($class_name);
			
			$file_content = '<?php'."\n";
			$file_content .= 'class ' . $prefix . $class_name ."\n";
			$file_content .= '{'."\n";
			$file_content .= '}'."\n";
			$file_content .= '?>';

			return $file_content;
		}

		public function pre($data)
		{
			echo '<pre>';
			print_r($data);
			echo '</pre>';
		}

	}

	$create = new CreateClass;
	$create->create();
?>