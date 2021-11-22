@php
    $dclienhe = DB::table('vhn_dclienhes')->where('stt','=','1')->orderBy('id','desc')->get();
    $tintuc = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','2']])->take(6)->orderBy('id','desc')->get();
    $mxh = DB::table('vhn_mxhs')->where('stt','=','1')->orderBy('id','desc')->get();
    $menu = DB::table('vhn_menu')->where('stt', '=', '1')->orderBy('id','asc')->get();
@endphp
<section class="back-2-top">
	<div class="btn-back-2-top"></div>
</section>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-lg-2">
				<div class="item"><img class="logo-footer" src="main_template/img/logo-footer.png" alt="logo-footer">
					<h3 class="footer-title">@lang('main.footer-title1')</h3>
					<div class="social">
						@foreach ($mxh as $item)
                            <a class="mdi mdi-{{$item->icon}}" href="{{$item->link}}" target="_blank"></a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-9 col-lg-7">
				<h3 class="footer-title flex-space-around">
					<a href="/">@lang('main.trangchu')</a>
					@foreach ($menu as $item)
						<a href="{{$item->link}}">
							@php
								if (App::getLocale() == 'vi') {
									echo($item->ten);
								}else{
									echo($item->tenjp);
								}
							@endphp
						</a>
					@endforeach
				</h3>
				<nav class="footer-nav">
					@foreach ($tintuc as $item)
						<li><a href="tintuc/{{$item->slug}}">
							@php
								if (App::getLocale() == 'vi') {
									echo($item->ten);
								}else{
									echo($item->tenjp);
								}
							@endphp
						</a></li>
					@endforeach
				</nav>
				<nav class="footer-nav">
					@foreach ($dclienhe as $item)
						<li>
							<h3 class="footer-title">
								@php
									if (App::getLocale() == 'vi') {
										echo($item->ten);
									}else{
										echo($item->tenjp);
									}
								@endphp
							</h3>
							<p>
								@php
									if (App::getLocale() == 'vi') {
										echo($item->diachi);
									}else{
										echo($item->diachijp);
									}
								@endphp
							</p>
							<p>{{$item->dienthoai}}</p>
							<p>{{$item->email}}</p>
							<p>{{$item->fax}}</p>
							<p>{{$item->website}}</p>
						</li>
					@endforeach
				</nav>
			</div>
			<div class="col-lg-3">
				<div class="footer-certifications">
					<div class="item"><a href="giayphep"><img src="main_template/img/icon-footer.png" alt="icon-footer"></a>
						<p style="font-weight: 700; color: #1D1D1B; text-transform: uppercase">1132/lđtnxh-gp</p>
						<p>@lang('main.footer-title2')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">Copyright © 2020 ACM Co., Ltd. All rights reserved.</div>
</footer>
<script src="main_template/js/global.min.js"></script>
<script src="main_template/js/main.min.js"></script>
{{-- datatable --}}
<script type="text/javascript" charset="utf8" src="main_template/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
