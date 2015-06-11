<span class="boldtext"><?php esc_html_e( 'How do I add the thumbnails to my posts?', $themename ); ?></span>
<div class="indent">
  <p><?php _e( 'Chameleon utilizes a script called TimThumb to automatically resize images. Whenever you make a new post you will need to add a custom field. Once you are on the edit/write page screen, click the "Screen Options" link on the top right of the screen and make sure "Custom Fields" is checked. Scroll down below the text editor and click on the &quot;custom fields&quot; link. In the &quot;Name&quot; section, input &quot;Thumbnail&quot; (this is case sensitive). In the &quot;Value&quot; area, input the url to your thumbnail image. Your image will automatically be resized and cropped. The image must be hosted on your domain. (this is to protect against bandwidth left)', $themename ); ?></p>
  <p><span class="style1"><?php _e( 'Important Note: You <u>must</u> CHMOD the &quot;cache&quot; folder located in the Chameleon directory to 777 for this script to work. You can CHMOD (change the permissions) of a file using your favorite FTP program. If you are confused try following <a href="http://www.siteground.com/tutorials/ftp/ftp_chmod.htm"><u>this tutorial</u></a><u>.</u> Of course instead of CHMODing the template folder (as in the tutorial) you would CHMOD the &quot;cache&quot; folder found within your theme\'s directory.', $themename ); ?></span></p>
</div>

<span class="boldtext"><?php esc_html_e( 'How do I add my title/logo?', $themename ); ?></span>
<div class="indent">
<?php _e( 'In this theme the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo_blank.png, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/Chameleon/images, and naming the file "logo.png". If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/Chameleon.psd', $themename ); ?></div>
<span class="boldtext"><?php esc_html_e( 'How do I manage advertisements on my blog?', $themename ); ?></span>
<div class="indent"><?php _e( 'You can change the images used in each of the advertisements, as well as which URL each ad points to, through the custom option pages found in wp-admin. Once logged in to the wordpress admin panel, click &quot;Design&quot; and then &quot;Chameleon Theme Options&quot; to reveal the various theme options. You can also use the 125x125 advertisement widget by adding the ET: Advertisement widget to your sidebar, and filling in the required fields.', $themename ); ?></div>
 
  <span class="boldtext"><?php esc_html_e( 'Using custom post types to manage Audio, Video and Photos', $themename ); ?></span>
  <div class="indent">
  <p><?php _e( 'Notebook allows for the posting for 4 different types of content. You can create an audio post, video post, photo post, or a standard blog posts. When you create a post, you will notice a box to the left of the text editor titled "Format." Within the box, select the post type that you would like to use. If you have selected the Audio or Video post type, you will next need to fill in the related field within the "ET Settings" box below the text editor. Here you acne add a URL to your Youtube or Vimeo video, or the URL to your audio MP3 or OGG file.', $themename ); ?>
</p>
  <p><?php _e( 'After you have selected our post type and filled in your media field, the next step is to add a Thumbnail image as outlined in the "How do I add the thumbnails to my posts?" section above.', $themename ); ?>
</p>
</div>

  <span class="boldtext"><?php esc_html_e( 'Customizing the fonts used in the theme', $themename ); ?></span>
  <div class="indent">
  <p><?php _e( 'Chameleon makes it easy to change what fonts are used in the theme. You can change the Header and Body fonts independently from within the Appearances > Chameleon Theme Options page under the General Settings > General tab. Look for the "Header Font" and "Body Font" settings and select your desired font from the dropddow menu.', $themename ); ?>
</p>
</div>

  <span class="boldtext"><?php esc_html_e( 'Adjust the theme\'s background image and color', $themename ); ?></span>
  <div class="indent">
  <p><?php _e( 'Chameleon comes with loads of background options. You can change the background color as well as choose from various overlay patterns to give your background a unique look. To adjust the background color of your theme, adjust the "Background Color" setting in ePanel located under the General Settings > General tab. When you click the field, a color wheel will pop up allowing you to choose any color.', $themename ); ?>
</p>
<p>
<?php _e( 'Next you can choose a background texture via the "Background Texture" setting located in the General Settings > General Tab of ePanel. You can also upload your own background image via the "Background Image" option.', $themename ); ?></p>
</div>

  <span class="boldtext"><?php esc_html_e( 'Using the Theme Customizer to easily experiment with font and color options', $themename ); ?></span>
  <div class="indent">
  <p><?php _e( 'Chameleon comes with a nifty customization control panel that allows you to adjust the visual elements of your theme on the fly. This control panel makes it easier to choose great colorschemes, instead of having to adjust colors one-by-one in ePanel, and having to save/preview along the way. To enable the control panel, locate the "Show Control Panel" option in the General Settings > General Tab of ePanel. Once enabled, a settings box will appear on the left hand side of your screen when browser your website. Use the various settings to adjust your theme\'s colors until you have found a combination that pleases you. Then simply add the color values you have chosen into ePanel and turn off the control panel to finalize your setup.', $themename ); ?>
</p>
</div>