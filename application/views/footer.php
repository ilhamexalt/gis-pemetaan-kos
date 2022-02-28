			</div>
			</div>
			</div>
			<footer class="page-break-top">
				<div class="footer-divider"></div>
				<div class="container">
					<div class="row">
						<div class="clearfix page-break-top"></div>
						<div class="hr5"></div>
						<div class="col-md-12">
							<p class="text-center"><small>Copyright <strong><a href="#">IAM PROJECT</a></strong> &copy; 2021</p>
						</div>
					</div>
				</div>
			</footer>

			<div class="modal fade" id="modal-alert">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<p><?php echo $this->session->flashdata('message') ?></p>
						</div>
					</div>
				</div>
			</div>


			<div class="modal" id="modal-delete">
				<div class="modal-dialog modal-sm modal-danger">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="fa fa-info-circle"></i> Hapus!</h4>
							<span>Hapus data ini dari database?</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
							<a href="#" id="btn-yes" class="btn btn-danger">Hapus</a>
						</div>
					</div>
				</div>
			</div>

			</body>

			</html>