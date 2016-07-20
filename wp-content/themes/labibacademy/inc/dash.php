<?php 
	
class dash extends hub_AdminPageFramework {

    

    /**

     * Sets up pages. 

     */

    public function setUp() {

        $this->setRootMenuPage( 'Hub Options' ); 

        $this->addSubMenuItem(

            array(
				'title'     => 'Theme Header',
                'page_slug' => 'theme_header'
            )
		);
		
		$this->addSubMenuItem(
			array(
				'title'     => 'Slider and Color',
                'page_slug' => 'slider_page'
            )

        );
		
		$this->addSubMenuItem(
			array(
				'title'     => 'Home and Theme',
                'page_slug' => 'home_page'
            )

        );
		
		$this->addSubMenuItem(
			array(
				'title'     => 'Contact and Basic',
                'page_slug' => 'contact_page'
            )

        );
		
		$this->addSettingSections(
            'theme_header',
            array(
                'section_id' => 'top_headder',
                'title' => 'Info & Social Link',
                'description' => 'Header top Social, Email, Contact & Info editing.',
            ),
            array(
                'section_id' => 'headder_logo',
                'title' => 'Site Logo',
                'description' => 'This section is for Changing Logo.',
            ),
            array(
                'section_id' => 'slider',
                'title' => '',
                'description' => '',
            ),
            array(
                'section_id' => 'footer_section',
                'title' => 'Bottom Address',
                'description' => 'This section is for Bottom Options.',
            )
        );
		
		$this->addSettingSections(
            'contact_page',
            array(
                'section_id' => 'contact',
                'title' => 'Contact and Page Details',
                'description' => 'Custom template Contact and Page Details settings',
            )
        );
		
		$this->addSettingSections(
            'home_page',
            array(
                'section_id' => 'home',
                'title' => 'Home Page Settings',
                'description' => 'Home Page Details settings and Edit option',
            )
        );
		
		$this->addSettingSections(
            'slider_page',
            array(
                'section_id' => 'color',
                'title' => 'Theme Color Settings',
                'description' => 'Basic Theme Color Options.',
            ),
			array(
                'section_id' => 'slider',
                'title' => 'Slider Settings',
                'description' => 'Basic Theme Slider Images.',
            )
        );
		
		$this->addSettingFields(
            'top_headder',
            array(
                'field_id' => 'phone',
                'type' => 'text',
                'title' => 'Contact Number',
                'default' => '+8801788909010'
            ),
            array(
                'field_id' => 'email',
                'type' => 'text',
                'title' => 'Email ID',
                'default' => 'labib2010@gmail.com'
            ),
            array(
                'field_id' => 'facebook',
                'type' => 'text',
                'title' => 'Facebook Page',
                'default' => '#'
            ),
            array(
                'field_id' => 'google',
                'type' => 'text',
                'title' => 'Google+ ID',
                'default' => '#'
            ),
            array(
                'field_id' => 'twitter',
                'type' => 'text',
                'title' => 'Twitter ID',
                'default' => '#'
            )
        );
		$this->addSettingFields(
            'headder_logo',
			array(
				'field_id'              => 'logo',
				'title'                 => 'Site Logo',
				'type'                  => 'image',
				'label'                 => '100 &#x3A7; 100 ',
				'default'				=> get_template_directory_uri().'/images/logo.png'
			)
        );
		$this->addSettingFields(
            'slider',
			array(
				'field_id'              => 'slider1',
				'title'                 => 'Slider Image',
				'type'                  => 'image',
				'label'                 => '600 &#x3A7; 300 ',
				'default'				=> get_template_directory_uri().'/images/slider/img1.jpg'
			),
			array(
				'field_id'              => 'slider2',
				'title'                 => 'Slider Image',
				'type'                  => 'image',
				'label'                 => '600 &#x3A7; 300 ',
				'default'				=> get_template_directory_uri().'/images/slider/img2.jpg'
			),
			array(
				'field_id'              => 'slider3',
				'title'                 => 'Slider Image',
				'type'                  => 'image',
				'label'                 => '600 &#x3A7; 300 ',
				'default'				=> get_template_directory_uri().'/images/slider/img3.jpg'
			),
			array(
				'field_id'              => 'slider4',
				'title'                 => 'Slider Image',
				'type'                  => 'image',
				'label'                 => '600 &#x3A7; 300 ',
				'default'				=> get_template_directory_uri().'/images/slider/img4.jpg'
			),
			array(
                'field_id' => 'submit_button',
                'type' => 'submit',
                'show_title_column' => false,
            )
        );
		$this->addSettingFields(
            'color',
			array(
				'field_id'      => 'color1',
				'title'         => 'Main Color',
				'type'          => 'color',
				'default'		=> '#ffffff'
			),
			array(
				'field_id'      => 'color2',
				'title'         => 'Text Color',
				'type'          => 'color',
				'default'		=> '#222222'
			),
			array(
				'field_id'      => 'color3',
				'title'         => 'Navigation and Heading Primary Color',
				'type'          => 'color',
				'default'		=> '#0a8bff'
			),
			array(
				'field_id'      => 'color4',
				'title'         => 'Navigation and Heading Secondary Color',
				'type'          => 'color',
				'default'		=> '#d02121'
			),
			array(
				'field_id'      => 'color5',
				'title'         => 'Navigation Background Color',
				'type'          => 'color',
				'default'		=> '#222222'
			),
			array(
				'field_id'      => 'color6',
				'title'         => 'Site secondary Color',
				'type'          => 'color',
				'default'		=> '#f5f5f5'
			),
			array(
				'field_id'      => 'color7',
				'title'         => 'Site Comment Border Color',
				'type'          => 'color',
				'default'		=> '#80b808'
			),
			array(
				'field_id'      => 'color8',
				'title'         => 'Site Footer Color',
				'type'          => 'color',
				'default'		=> '#363636'
			),
			array(
                'field_id' => 'submit_button',
                'type' => 'submit',
                'show_title_column' => false,
            )
        );
		$this->addSettingFields(
            'footer_section',
			array(
				'field_id'              => 'footer_address',
				'title'                 => 'Footer Address',
				'type'                  => 'textarea',
				'rich'          		=> false,
				'default'				=> '
					<p>Copyright &copy; 2015 Labib Academy - All Right Reserved.</p>
					<p>Address : 11-a/1, Block-F, Aziz Moholla, Madrasha Road, Mohammadpur, Dhaka 1207</p>
					<p>Phone : +22 029134591, +880 1750164566</p>
					<p>E-mail : labibacademy2010@gmail.com</p>
				'
			),
			array(
                'field_id' => 'submit_button',
                'type' => 'submit',
                'show_title_column' => false,
            )
        );
		$this->addSettingFields(
            'contact',
            array(
                'field_id' => 'gmap',
                'type' => 'text',
                'title' => 'Google Map Position',
                'default' => '23.769092, 90.362907'
            ),
            array(
                'field_id' => 'cf7',
                'type' => 'text',
                'title' => 'Contact Form 7 SHORTCODE',
                'default' => '[contact-form-7 id="6" title="Contact form 1"]'
            ),
			array(
				'field_id'              => 'sidebar_img',
				'title'                 => 'Page Sidebar Image',
				'type'                  => 'image',
				'label'                 => '245 &#x3A7; 600 ',
				'default'				=> get_template_directory_uri().'/images/right-long.png'
			),
            array(
                'field_id' => 'submit_button',
                'type' => 'submit',
                'show_title_column' => false,
            )
        );
		$this->addSettingFields(
            'home',
			array(
                'field_id' => 'sea',
                'type' => 'text',
                'title' => 'Sea All Button Text',
                'default' => 'See All'
            ),
			array(
                'field_id' => 'sea_link',
                'type' => 'text',
                'title' => 'Sea All Button Link',
                'default' => '#'
            ),
            array(
                'field_id' => 'latest_notices',
                'type' => 'text',
                'title' => 'Latest Notices Option Text',
                'default' => 'Latest Notices'
            ),
            array(
                'field_id' => 'gullery',
                'type' => 'text',
                'title' => 'Gallery button Text',
                'default' => 'Gallery'
            ),
            array(
                'field_id' => 'gullery_link',
                'type' => 'text',
                'title' => 'Gallery button Link',
                'default' => '#'
            ),
			array(
                'field_id' => 'calender',
                'type' => 'text',
                'title' => 'Academic Calender button Text',
                'default' => 'Academic Calender'
            ),
            array(
                'field_id' => 'calender_link',
                'type' => 'text',
                'title' => 'Academic Calender button Link',
                'default' => '#'
            ),
			array(
                'field_id' => 'campus',
                'type' => 'text',
                'title' => 'Campus Tour button Text',
                'default' => 'Campus Tour'
            ),
            array(
                'field_id' => 'campus_link',
                'type' => 'text',
                'title' => 'Campus Tour button Link',
                'default' => '#'
            ),
            array(
                'field_id' => 'intro',
                'type' => 'text',
                'title' => 'Introduction Head',
                'default' => 'Introducing Our School'
            ),
			array(
				'field_id'              => 'intro_short',
				'title'                 => 'Introduction Summery',
				'type'                  => 'textarea',
				'rich'          		=> false,
				'default'				=> '
					<p class="h3 text-center"> السلام عليكم و رحمة الله و بركة ه </p>
					<p>All praises belong to our lord Allah Subhanahu wa ta’ala who created us as Muslim. Acquiring knowledge is obligatory for every Muslim man and woman. In our society , the education is meant to general education. Every conscious parents try to admit their child to renowned educational institutions for better education. Parents try to find out the institutions according to their mentality. We all know that, there are two types of institutions prevailing in our society. One is general education, where students are taught general subjects like Bangla, English, and Physics etc excluding the Islamic knowledge. On the other hand, in Islamic education system the students learn only Islamic subjects. But, both are simultaneously essential. </p>
					<p>Labib Academy Bangladesh has been established in the year 2010 with the view to introduce an integrated approach of both the systems.   Presently, the academy is running its activities from Nursery to Class VIII. Besides, the academy made it obligatory to learn recitation from the Holy Quran accurately.   The students with brilliance have an opportunity to memorize the Holy Quran (Hifzul Quran). The academy offers both facilities of residential and non-residential.  </p>
					<p>We hope success of your children in the world and the hereafter.</p>
				'
			),
			array(
				'field_id'              => 'intro_dec',
				'title'                 => 'Introduction Description',
				'type'                  => 'textarea',
				'rich'          		=> false,
				'default'				=> '
					<p class="text-justify">
						All praises belong to our lord Allah Subhanahu wa ta’ala who created us as Muslim. Acquiring knowledge is obligatory for every Muslim man and woman. In our society , the education is meant to general education. Every conscious parents try to admit their child to renowned educational institutions for better education. Parents try to find out the institutions according to their mentality . . . . .
					</p>
				'
			),
			array(
                'field_id' => 'test',
                'type' => 'text',
                'title' => 'Testimonial Heading',
                'default' => 'Islam and Muslim'
            ),
			array(
                'field_id' => 'test_short',
                'type' => 'text',
                'title' => 'Testimonial Shortcode',
                'default' => '[wpt_random]'
            ),
			array(
                'field_id' => 'test_link',
                'type' => 'text',
                'title' => 'Testimonial ReadMore Link',
                'default' => '#'
            ),
			array(
                'field_id' => 'masage',
                'type' => 'text',
                'title' => 'Masage Head',
                'default' => 'Message From The Director'
            ),
			array(
				'field_id'              => 'masage_short',
				'title'                 => 'Masage Summery',
				'type'                  => 'textarea',
				'rich'          		=> false,
				'default'				=> '
					<p><img style="width:100%" src="'. get_template_directory_uri() .'/images/pp.jpg"></p>
					<p class="text-justify">
						Al-hamdulillah. In 2010 Labib Academy Bangladesh was established with the view to offer integrated . . . . .
					</p>
				'
			),
			array(
				'field_id'              => 'masage_dec',
				'title'                 => 'Masage Description',
				'type'                  => 'textarea',
				'rich'          		=> false,
				'default'				=> '
										<p class="h3 text-center">بسم الله الرحمن الرحيم</p>
										<p><img style="width:100%" src="'. get_template_directory_uri() .'/images/pp.jpg"></p>
										<p>
											Al-hamdulillah. In 2010 Labib Academy Bangladesh was established with the view to offer integrated approach of both General and Islamic education. Since then, the academy is running under a committee with reputed educationists having religious mentality.
										</p>
										<p>
											In the initial stage, the academy started with a very few students from the adjacent locality. But now it attracted a huge number of students from all over the country. In the mean time, students from this academy faced PEC and JSC Examinations with excellent results. Besides, more than 30 students completed Hifzul Quran and around 80 students are going to be completed.
										</p>
										<p>
											We have a plan to expand academic level up to Class XII soon. Within the academic calendar our students will cover Arabic language (writing and spoken), interpretation of Holy Quran and Hadith (Riadus Salihin).
										</p>
										<p>
										We already introduced website in the name of http:labibacademy.net for easy communication and access to all. We welcome all sorts of suggestions, comments from our well wishers.
										</p>
										<p>
										May Allah accept our Endeavour and enlighten us here and hereafter.
										</p></br>
										<p>
											Regards,</br></br>
											<img src="'. get_template_directory_uri() .'/images/sign.png"></br>

											Md. Lutfar Rashid </br>
											Director </br>
											Labib Academy Bangladesh
										</p>
				'
			),
            array(
                'field_id' => 'submit_button',
                'type' => 'submit',
                'show_title_column' => false,
            )
        );
		
		
    }


	
	

}

new dash;