<?php
/**
 * Project: mms.
 * File name: footer.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 9:51 AM
 * Email: kenzaki@xiao.vn
 */
?>
<!-- Footer
================================================== -->

	</div> <!-- /.span9 -->
	</div> <!-- /.row -->
	<footer>
		<hr>
		<p>
			<a href="#" target="_TOP">&copy; Xiao 2013</a>
			<?php
				if ( empty($setTranslate) ) $setTranslate = new Translate();
				$setTranslate->languageSelector();
			?>
		</p>
	</footer>

</div> <!-- /.container -->

	<!-- Le javascript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="assets/js/bootstrap-transition.js"></script>
	<script src="assets/js/bootstrap-collapse.js"></script>
	<script src="assets/js/bootstrap-modal.js"></script>
	<script src="assets/js/bootstrap-dropdown.js"></script>
	<script src="assets/js/bootstrap-button.js"></script>
	<script src="assets/js/bootstrap-tab.js"></script>
	<script src="assets/js/bootstrap-alert.js"></script>
	<script src="assets/js/bootstrap-tooltip.js"></script>
	<script src="assets/js/jquery.ba-hashchange.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.placeholder.min.js"></script>
	<script src="assets/js/jquery.jigowatt.js"></script>

  </body>
</html>
<?php ob_flush(); ?>