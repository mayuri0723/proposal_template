<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1000, initial-scale=1.0">
	<title>Dasboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

</head>

<body>
	<div class="grid">
		<header class="header">
			<i class="fas fa-bars header__menu"></i>
			<div class="header__search">
				<input class="header__input" placeholder="Search..." />
			</div>
			<div class="header__avatar"
			style="background-image: url('img/Steels.png');">
				<div class="dropdown">
					<ul class="dropdown__list">
						<!-- <li class="dropdown__list-item">
          <span class="dropdown__icon"><i class="far fa-user"></i></span>
          <span class="dropdown__title">my profile</span>
        </li> -->
						<!-- <li class="dropdown__list-item">
          <span class="dropdown__icon"><i class="fas fa-clipboard-list"></i></span>
          <span class="dropdown__title">my account</span>
        </li> -->
						<li class="dropdown__list-item">
						<a href="logout.php">
							<span class="dropdown__icon">
								<i class="fas fa-sign-out-alt"></i></span>
							<span class="dropdown__title">log out</span></a>
						</li>
					</ul>
				</div>
			</div>
		</header>

		<aside class="sidenav">
			<div class="sidenav__brand">
				<i class="fas fa-feather-alt sidenav__brand-icon"></i>
				<a class="sidenav__brand-link" href="#">Steel<span class="text-light">Soft</span></a>
				<i class="fas fa-times sidenav__brand-close"></i>
			</div>
			<!-- <div class="sidenav__profile">
				<div class="sidenav__profile-avatar"></div> 
				<div class="sidenav__profile-title text-light">Menu</div>
			</div> -->
			<div class="row row--align-v-center row--align-h-center">
				<ul class="navList">
					<li class="navList__heading">documents<i class="far fa-file-alt"></i></li>
					<li>
						<div class="navList__subheading row row--align-v-center">
							<span class="navList__subheading-icon"><i class="fas fa-briefcase-medical"></i></span>
							<span class="navList__subheading-title">Details</span>
						</div>
						<!-- <ul class="subList subList--hidden">
							<li class="subList__item">About</li>
							<li class="subList__item">content</li>
							<li class="subList__item">aspects</li>
						</ul> -->
					</li>
				
      

				</ul>
			</div>
		</aside>

		<main class="main">
			<div class="main-header">
				<div class="main-header__intro-wrapper">
					<div class="main-header__welcome">
						<div class="main-header__welcome-title text-light">Welcome</div>
						<div class="main-header__welcome-subtitle text-light">How are you today?</div>
					</div>

				</div>
			</div>

			<div class="main-overview">
				<!-- 1st card -->
				
					<div class="overviewCard">
						<div class="overviewCard-icon overviewCard-icon--document">
							<i class="far fa-file-alt"></i>
						</div>
						<div class="overviewCard-description">
						<a href="create_template.php">		<h3 class="overviewCard-title text-light"> Create New <strong>Proposal</strong></h3></a>
							<!-- <p class="overviewCard-subtitle">Creates new proposals</p> -->
						</div>
					</div>
				

				<!-- 3rd card -->
				<div class="overviewCard">
					<div class="overviewCard-icon overviewCard-icon--photo">
						<i class="far fa-file-image"></i>
					</div>
					<div class="overviewCard-description">
						<?php
        include('count.php');
        ?>
						<h3 class="overviewCard-title text-light">Count =<strong>
								<?php  echo $rowcount;?>
							</strong></h3>
						<!-- <p class="overviewCard-subtitle">Count of proposals</p> -->
					</div>
				</div>
			</div>
			<!-- /.main__overview -->
			<div class="main__cards">
				<!-- 1st view of card events -->
				<!-- <div class="card">-->

				<div class="card">
					<div class="card__header">
						<div class="card__header-title text-light">Recent <strong>Documents</strong>
							<a href="display.php" class="card__header-link text-bold">View All</a>
						</div>
						<div class="settings">
							<div class="settings__block"><i class="fas fa-edit"></i></div>
							<div class="settings__block"><i class="fas fa-cog"></i></div>
						</div>
					</div>
					<div class="documents">
					<?php
               $pn =0; 
		if ($result->num_rows > 0) {
	 // output data of each row
	   while($row = $result->fetch_assoc()) {
       $pn++;
       if($pn==4){
         break;
       }
	  ?>
						<div class="document">
							<div class="document__img">
								<?php echo $row["proposal_number"]; ?>
							</div>
						</div>
						<?php 
                      }
                      } else {
                    echo "0 results";
                  }
          
                   ?>
					</div>
				</div> <!-- /.main-cards -->
		    </main>

		<footer class="footer">
			<p><span class="footer__copyright">&copy;</span> 2022 </p>
			<!-- <p>Crafted with <i class="fas fa-heart footer__icon"></i> by <a href="https://www.linkedin.com/in/matt-holland/" target="_blank" class="footer__signature">Matt H</a></p> -->
		</footer>
	</div>






	<script>
		/* Scripts for css grid dashboard */

		$(document).ready(() => {
			addResizeListeners();
			setSidenavListeners();
			setUserDropdownListener();
			renderChart();
			setMenuClickListener();
			setSidenavCloseListener();
		});

		// Set constants and grab needed elements
		const sidenavEl = $('.sidenav');
		const gridEl = $('.grid');
		const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
		const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

		function toggleClass(el, className) {
			if (el.hasClass(className)) {
				el.removeClass(className);
			} else {
				el.addClass(className);
			}
		}

		// User avatar dropdown functionality
		function setUserDropdownListener() {
			const userAvatar = $('.header__avatar');

			userAvatar.on('click', function (e) {
				const dropdown = $(this).children('.dropdown');
				toggleClass(dropdown, 'dropdown--active');
			});
		}

		// Sidenav list sliding functionality
		function setSidenavListeners() {
			const subHeadings = $('.navList__subheading'); console.log('subHeadings: ', subHeadings);
			const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
			const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

			subHeadings.each((i, subHeadingEl) => {
				$(subHeadingEl).on('click', (e) => {
					const subListEl = $(subHeadingEl).siblings();

					// Add/remove selected styles to list category heading
					if (subHeadingEl) {
						toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
					}

					// Reveal/hide the sublist
					if (subListEl && subListEl.length === 1) {
						toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
					}
				});
			});
		}

		// Draw the chart
		function renderChart() {
			const chart = AmCharts.makeChart("chartdiv", {
				"type": "serial",
				"theme": "light",
				"dataProvider": [{
					"month": "Jan",
					"visits": 2025
				}, {
					"month": "Feb",
					"visits": 1882
				}, {
					"month": "Mar",
					"visits": 1809
				}, {
					"month": "Apr",
					"visits": 1322
				}, {
					"month": "May",
					"visits": 1122
				}, {
					"month": "Jun",
					"visits": 1114
				}, {
					"month": "Jul",
					"visits": 984
				}, {
					"month": "Aug",
					"visits": 711
				}, {
					"month": "Sept",
					"visits": 665
				}, {
					"month": "Oct",
					"visits": 580
				}],
				"valueAxes": [{
					"gridColor": "#FFFFFF",
					"gridAlpha": 0.2,
					"dashLength": 0
				}],
				"gridAboveGraphs": true,
				"startDuration": 1,
				"graphs": [{
					"balloonText": "[[category]]: <b>[[value]]</b>",
					"fillAlphas": 0.8,
					"lineAlpha": 0.2,
					"type": "column",
					"valueField": "visits"
				}],
				"chartCursor": {
					"categoryBalloonEnabled": false,
					"cursorAlpha": 0,
					"zoomable": false
				},
				"categoryField": "month",
				"categoryAxis": {
					"gridPosition": "start",
					"gridAlpha": 0,
					"tickPosition": "start",
					"tickLength": 20
				},
				"export": {
					"enabled": false
				}
			});
		}

		function toggleClass(el, className) {
			if (el.hasClass(className)) {
				el.removeClass(className);
			} else {
				el.addClass(className);
			}
		}

		// If user opens the menu and then expands the viewport from mobile size without closing the menu,
		// make sure scrolling is enabled again and that sidenav active class is removed
		function addResizeListeners() {
			$(window).resize(function (e) {
				const width = window.innerWidth; console.log('width: ', width);

				if (width > 750) {
					sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
					gridEl.removeClass(GRID_NO_SCROLL_CLASS);
				}
			});
		}

		// Menu open sidenav icon, shown only on mobile
		function setMenuClickListener() {
			$('.header__menu').on('click', function (e) {
				console.log('clicked menu icon');
				toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
				toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
			});
		}

		// Sidenav close icon
		function setSidenavCloseListener() {
			$('.sidenav__brand-close').on('click', function (e) {
				toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
				toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
			});
		}

	</script>
</body>

</html>