<?php
if(!class_exists('IMAQCorePermalink')):
	class IMAQCorePermalink
	{
		public function __construct()
		{
			add_action('admin_menu', array($this, 'addSettingsPage'));
			add_action('wp_ajax_IMAQ_url_settings', array($this, 'saveSettings'));
			add_action('plugins_loaded', array($this, 'rewriteCPTs') );
		}

		public function addSettingsPage() {
			add_options_page(
				__('IMAQ URL Settings', 'IMAQ'),
				__('IMAQ URL Settings', 'IMAQ'),
				'manage_options',
				'IMAQ_url_settings',
				array($this, 'settingsPage')
			);
		}

		public function settingsPage() {
				wp_enqueue_style('IMAQ_url_settings_style', plugin_dir_url( __DIR__ ) . 'assets/css/url_settings.css');
				wp_enqueue_script('IMAQ_url_settings_script', plugin_dir_url( __DIR__ ) . 'assets/js/url_settings.js', array('jquery'));
				$urlSettings = $this->getUrlSettings();
			?>
			<div class="wrap IMAQ_url_settings">
				<h1><?php esc_html_e('IMAQ URL Structure Settings', 'IMAQ');?></h1>
				<p><?php esc_html_e('Please configure the URL settings for the custom post types here. The permalink need to be valid, No space, special char is allowed', 'IMAQ');?></p>
				<div class="IMAQ_fields">
					<form id="IMAQ_url_settings_form">
						<input type="hidden" name="action" value="IMAQ_url_settings">
						<div class="form_group">
							<label for=""><?php esc_html_e('Book Post Type Permalink', 'IMAQ');?></label>
							<input value="<?php echo $urlSettings['book']; ?>" class="regular-text" type="text" name="IMAQ_url_structure[book]" />
						</div>
						<div class="form_group">
							<label for=""><?php esc_html_e('Event Post Type Permalink', 'IMAQ');?></label>
							<input value="<?php echo $urlSettings['event']; ?>" class="regular-text" type="text" name="IMAQ_url_structure[event]" />
						</div>
						<div class="form_group">
							<label for=""><?php esc_html_e('Journal Articles Post Type Permalink', 'IMAQ');?></label>
							<input value="<?php echo $urlSettings['journal_article']; ?>" class="regular-text" type="text" name="IMAQ_url_structure[journal_article]" />
						</div>
						<div class="form_group">
							<label for=""><?php esc_html_e('Teams Post Type Permalink', 'IMAQ');?></label>
							<input value="<?php echo $urlSettings['team']; ?>" class="regular-text" type="text" name="IMAQ_url_structure[team]" />
						</div>
						<div class="form_group">
							<button><?php esc_html_e('Save Settings', 'IMAQ');?></button>
						</div>
					</form>
				</div>
			</div>
		<?php
		}

		public function saveSettings() {

			$urlStructures = $_POST['IMAQ_url_structure'];
			$formatted = array();
			$errors = array();

			foreach ($urlStructures as $key => $value) {
				$value = sanitize_title(sanitize_text_field($value));
				if(!$value || in_array($value, $formatted)) {
					$errors[$key] = $value;
				}
				$formatted[$key] = $value;
			}
			if(count($errors)) {
				wp_send_json_error(array(
					'message' => __('Please fill up all the fields and each field need to be unique', 'IMAQ')
				), 422);
				die();
			}

			update_option('IMAQ_url_structure', $formatted, true);

			flush_rewrite_rules(true);

			wp_send_json_success(array(
				'message' => __('URL Structures Successfully Updated, Please goto <b>Setting->Permalinks</b> and Save the permalinks again if you get 404 error', 'IMAQ')
			), 200);
			die();
		}

		public function rewriteCPTs()
		{
			$settings = $this->getUrlSettings();
			add_filter('IMAQ_book_cpt_url_slug', function($old_slug) use ($settings) {
				return $settings['book'];
			});

			add_filter('IMAQ_event_cpt_url_slug', function($old_slug) use ($settings) {
				return $settings['event'];
			});

			add_filter('IMAQ_journal_article_cpt_url_slug', function($old_slug) use ($settings) {
				return $settings['journal_article'];
			});

			add_filter('IMAQ_rushmore_teams_cpt_url_slug', function($old_slug) use ($settings) {
				return $settings['team'];
			});
		}

		private function getUrlSettings() {
			$settingsName = 'IMAQ_url_structure';
			$defaultSettings = array(
				'book' => 'rushmore_book',
				'event' => 'rushmore_event',
				'journal_article' => 'journal_article',
				'team' => 'rushmore_teams'
			);
			$settings = get_option($settingsName, array());
			$settings = wp_parse_args($settings, $defaultSettings);
			return $settings;
		}

	}
	new IMAQCorePermalink();
endif;