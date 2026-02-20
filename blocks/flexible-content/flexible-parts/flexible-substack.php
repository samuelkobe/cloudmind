<?php if ( get_sub_field( 'substack_toggle' ) == 1 ) : ?>
<div class="flex flex-col gap-y-2 mt-4 lg:mt-6">
  <h4 class="text-dark font-sans font-medium text-base md:text-lg"><?php echo get_sub_field( 'substack_subtitle' ); ?></h4>
  <div id="custom-substack-embed"></div>
    <script>
      window.CustomSubstackWidget = {
        substackUrl: "<?php echo get_sub_field( 'substack_url' ); ?>",
        placeholder: "example@gmail.com",
        buttonText: "Subscribe",
        theme: "custom",
            colors: {
              primary: "#201910",
              input: "#ffffff",
              email: "#201910",
              text: "#FFFFFF",
            },
      };
    </script>
    <script src="https://substackapi.com/widget.js" async></script>
</div>
<?php endif; ?>