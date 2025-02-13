/**
 *  Responsive auto YouTube channel videos list
 *  @author:  CFconsultancy
 *  @version: 1.2 (Jun/09/2013)
 *  http://www.cfconsultancy.nl
 */

(function($) {

    $.fn.YoutubeVideoGalleryPlugin = function(options) {

    var $this = $(this);

        $.fn.YoutubeVideoGalleryPlugin.defaults = {
		  listtype: 'search',
          video_id: 'hd nature',
          autoplay: false,
          theme: false,
          loop: false,
          maxwidth: '',
          center: false,
          right: false,
          left: false
        };

        var options = $.extend({}, $.fn.YoutubeVideoGalleryPlugin.defaults, options);

        var windowsize = $(window).width();

        return this.each(function() {

        var $div = this;

	    $(this).find('div')
	     .addBack()
	     .wrapAll('<div class="youtube-video-gallery-plugin"></div>');

	    $(this).addClass('video_gallery_plugin');

	    if (options.theme == true) {

        $(this).closest('.youtube-video-gallery-plugin').removeClass('youtube-video-gallery-plugin').addClass('youtube-video-gallery-plugin-white');

          if (options.maxwidth != '') {

            	$(this).closest('.youtube-video-gallery-plugin-white').css('max-width', '' + options.maxwidth + '');

	            if (options.center == true) {

	                $(this).closest('.youtube-video-gallery-plugin-white').css('margin', '0 auto');

	            }
	            if (options.right == true) {

	                $(this).closest('.youtube-video-gallery-plugin-white').css({'float': 'right', width: '' + options.maxwidth + ''});

	            }
	            if (options.left == true) {

	                $(this).closest('.youtube-video-gallery-plugin-white').css({'float': 'left', width: '' + options.maxwidth + ''});

	            }

            }

        } else {

            $(this).closest('.youtube-video-gallery-plugin').removeClass('youtube-video-gallery-plugin').addClass('youtube-video-gallery-plugin-black');

            if (options.maxwidth != '') {

            	$(this).closest('.youtube-video-gallery-plugin-black').css('max-width', '' + options.maxwidth + '');

                if (options.center == true) {

	                $(this).closest('.youtube-video-gallery-plugin-black').css('margin', '0 auto');

	            }
	            if (options.right == true) {

	                $(this).closest('.youtube-video-gallery-plugin-black').css({'float': 'right', width: '' + options.maxwidth + ''});

	            }
	            if (options.left == true) {

	                $(this).closest('.youtube-video-gallery-plugin-black').css({'float': 'left', width: '' + options.maxwidth + ''});

	            }
            }

        }


	    if (windowsize < 480) {
	    	$(this).closest('.video_gallery_plugin').css('padding-bottom', '48.25%');
	    }

        if (options.listtype == 'custom') {

	    var my_string = options.video_id;
	    var splitted = my_string.split(',');
	    var firstitem = splitted.shift();
	    var listitems = splitted.join(',');

            var customplaylist = '<iframe style="visibility:hidden;" onload="this.style.visibility=\'visible\';" src="' + window.location.protocol + '//www.youtube.com/embed/' + encodeURI(firstitem) + '?playlist=' + encodeURI(listitems) + '';

        } else {

			var customplaylist = '<iframe style="visibility:hidden;" onload="this.style.visibility=\'visible\';" src="' + window.location.protocol + '//www.youtube.com/embed/?listtype=' + options.listtype + '&list=' + encodeURI(options.video_id)+ '';

        }
            var $iframe = $('' + customplaylist +
            '&autoplay=' + (options.autoplay ? '1' : '0') +
            '&loop=' + (options.loop ? '1' : '0') +
            '&theme=' + (options.theme ? 'light' : 'dark') +
            ''+ (options.hd ? '&vq=hd420' : '') +'&wmode=opaque" frameborder="0"></iframe>');
            $iframe.appendTo($div);
    	});
    };

	$(document).ready(function() {
  
    

  		$(".video-gallery-plugin-placeholder").each(function() {

  			var $this = $(this),
  				el = $this[0],
  				arr = [];

  			for (var i=0, attrs=el.attributes, l=attrs.length; i<l; i++){
  				if(attrs.item(i).nodeName === 'class') {
  					continue;
  				}
  				var name = attrs.item(i).nodeName,
  					value = attrs.item(i).nodeValue;

  				if(value === 'true') {
  					value = true;
  				}else if(value === 'false') {
  					value = false;
  				}

  				arr[name.replace('data-', '')] = value;
  			}

  			$this.YoutubeVideoGalleryPlugin(arr);

  		});

      // $('a.venobox').on('click', function(ev) {
      //     $('.venobox').venobox();
      // });

	});

})(jQuery);