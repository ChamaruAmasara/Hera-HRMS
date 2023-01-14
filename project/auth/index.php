<?php header('Access-Control-Allow-Origin: *');?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../"/>
		<meta charset="utf-8" />
		<!-- Primary Meta Tags -->
		<title>Login | Hera - The Modern Human Resource Management System</title>
		<meta name="title" content="Hera - The Modern Human Resource Management System">
		<meta name="description" content="Hera - The Human Resource Management System - Get organized with your employee data. Streamline onboarding, access personal information, generate employee reports, manage leave applications and payrolls with the click of a button!">

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://hera.chamaru.me/auth/">
		<meta property="og:title" content="Login | Hera - The Modern Human Resource Management System">
		<meta property="og:description" content="Hera - The Human Resource Management System - Get organized with your employee data. Streamline onboarding, access personal information, generate employee reports, manage leave applications and payrolls with the click of a button!">
		<meta property="og:image" content="https://hera.chamaru.me/assets/media/image.jpg">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://hera.chamaru.me/auth/">
		<meta property="twitter:title" content="Hera - The Modern Human Resource Management System">
		<meta property="twitter:description" content="Hera - The Human Resource Management System - Get organized with your employee data. Streamline onboarding, access personal information, generate employee reports, manage leave applications and payrolls with the click of a button!">
		<meta property="twitter:image" content="https://hera.chamaru.me/assets/media/image.jpg">
		<meta name="keywords" content="human,resource,program,application,development,product,employee,management,easy,to,use,free" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="https://hera.chamaru.me" />
		<meta property="og:site_name" content="Hera | CSE | UoM" />
		<link rel="canonical" href="https://hera.chamaru.me" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-37VKWSZBN0"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-37VKWSZBN0');
	</script>
	<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "fe3ufricqe");
	</script>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/63c277d847425128790d67f9/1gmnq8abf';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->


	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('assets/media/auth/bg4.jpg'); } [data-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						<a href="#" class="mb-7">
							<img alt="Logo" src="assets/media/logos/HERA-logo.png" width="200px" height="auto"/>
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">The Human Resource Management System</h2>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-550px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form  method="post" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="index.php">
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">to access HERA</div>
									<!--end::Subtitle=-->
									<?php
	if (isset($_GET['errors'])){
            foreach ($_GET['errors'] as $error) {
                echo <<<EOT
                <br><!--begin::Alert-->
                <div class="alert alert-danger d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                </svg></span>
                    <!--end::Icon-->
                
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-lg-start">
                        <!--begin::Title-->
                        <h4 class="mb-1 d-flex flex-center flex-lg-start flex-column text-danger">Error</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>
                EOT;
                echo $error;
                echo <<<EOT
                </span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <i class="bi bi-x fs-1 text-danger"></i>
                    </button>
                </div>
                <!--end::Alert-->

                EOT;
            }
        }
		if (isset($_GET['messages'])){
            foreach ($_GET['messages'] as $message) {
            echo <<<EOT

            <br><!--begin::Alert-->
            <div class="alert alert-primary d-flex align-items-center p-5">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-primary me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
            </svg></span>
                <!--end::Icon-->
            
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-lg-start">
                    <!--begin::Title-->
                    <h4 class="mb-1 d-flex flex-center flex-lg-start flex-column text-primary">Notice</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>
            EOT;
            echo $message;
            echo <<<EOT
            </span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="bi bi-x fs-1 text-primary"></i>
                </button>
            </div>
            <!--end::Alert-->

            EOT;
        
    }
}
									?>
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="User Name" name="user_name" autocomplete="on" class="form-control bg-transparent" id="login_input_username" required/>
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="user_password" autocomplete="on" class="form-control bg-transparent" d="login_input_password" required/>
									<!--end::Password-->
								</div>
								<!--end::Input group=-->

								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<input type="submit"  name="login" value="Log in" class="btn btn-primary"/>
								</div>
								<!--end::Submit button-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>