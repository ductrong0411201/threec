<div class="header-wrapper">
	<div class="container">
		<header class="header py-2 px-4 d-flex align-items-center justify-content-between">
			<!-- Logo + Tên -->
			<div class="header-logo d-flex align-items-center">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

				if (has_custom_logo()) {
					echo '<a href="' . esc_url(home_url('/')) . '">
			<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">
		  </a>';
				} else {
					echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
				}
				?>
			</div>

			<!-- Nút menu (chỉ hiện khi mobile) -->
			<button class="menu-toggle d-lg-none" id="menuToggle" aria-label="Toggle menu">
				<span></span>
				<span></span>
				<span></span>
			</button>

			<!-- Menu chính -->
			<div class="col-lg-8 d-flex justify-content-between align-items-center">
				<div class="header-menu-container">
					<?php wp_nav_menu(array(
						'theme_location' => 'header-menu',
						'menu_class' => 'header-menu',
						'container' => 'nav',
						'container_class' => 'header-navigation',
						'container_id'    => 'navMenu',
						'fallback_cb' => false,
					)); ?>
				</div>
				<a class="contact-us-button" href="/lien-he">Liên hệ</a>
				<!-- <a class="contact-us-button" href="/?page_id=165">Liên hệ</a> -->
			</div>
		</header>
	</div>
</div>

<style>
	/* =========================
    BASE STYLE (Desktop)
   ========================= */
body {
	margin: 0;
	padding: 0;
	position: relative;
}

.header-wrapper {
	position: absolute;
	top: 20px;
	width: 100%;
}

.header {
	background: rgba(255, 255, 255, 0.7);
	backdrop-filter: blur(8px);
	border-radius: 50px;
	margin: 20px;
	box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
	position: relative;
	z-index: 100;
}

.header-logo a img {
	width: 220px;
	height: 55px;
	object-fit: contain;
}

/* Menu Desktop */
.header-menu-container ul {
	display: flex;
	align-items: center;
	gap: 28px;
	margin: 0;
}

.header-menu-container ul li {
	list-style: none;
}

.header-menu-container ul li a {
	color: #222;
	font-weight: 500;
	text-decoration: none;
	transition: 0.3s;
}

.header-menu-container ul li a:hover {
	color: #d4af37;
}

.contact-us-button {
	text-decoration: none;
	color: #ffffff;
	background-color: #333;
	padding: 10px 30px;
	border-radius: 30px;
}
.contact-us-button:hover {
	color: #ffffff;
	background-color: #333;
}
.contact-mobile {
	display: none;
}

/* Nút mobile */
.menu-toggle {
	display: none;
	flex-direction: column;
	justify-content: space-between;
	width: 28px;
	height: 22px;
	background: none;
	border: none;
	cursor: pointer;
}

.menu-toggle span {
	display: block;
	height: 3px;
	background: #222;
	width: 100%;
	border-radius: 3px;
	transition: 0.3s;
}

/* Active -> X */
.menu-toggle.active span:nth-child(1) {
	transform: rotate(45deg) translateY(8px);
}
.menu-toggle.active span:nth-child(2) {
	opacity: 0;
}
.menu-toggle.active span:nth-child(3) {
	transform: rotate(-45deg) translateY(-8px);
}

.mobile-extra {
    display: none;
}

@media (max-width: 991px) {
    .mobile-extra {
        display: block;
    }
}


/* =========================
       1) TABLET: 768–1199px
   ========================= */
@media (max-width: 1199px) {
	.header {
		padding: 10px 20px !important;
	}

	.header-logo a img {
		width: 180px;
		height: 48px;
	}

	.header-menu-container ul {
		gap: 18px;
	}

	.header-menu-container ul li a {
		font-size: 15px;
	}
}


/* =========================
       2) MOBILE: <768px
   ========================= */
@media (max-width: 767px) {
	.header {
		border-radius: 20px;
		margin: 10px;
		padding: 10px 15px !important;
	}

	.header-logo a img {
		width: 150px;
		height: auto;
	}

	.menu-toggle {
		display: flex;
	}

	/* Ẩn menu */
	.header-navigation {
		display: none !important;
	}

	/* Menu mobile */
	.header-navigation.show {
		display: block !important;
		position: fixed;
		top: 80px;
		left: 10px;
		right: 10px;
		background: rgba(255, 255, 255, 0.97);
		padding: 20px;
		border-radius: 16px;
		box-shadow: 0 6px 16px rgba(0,0,0,0.15);
		animation: fadeIn 0.3s ease forwards;
	}

	.header-navigation ul {
		flex-direction: column;
		align-items: flex-start;
		gap: 15px;
	}

	.header-navigation ul li a {
		width: 100%;
		padding: 8px 0;
		font-size: 16px;
	}

	.contact-mobile {
		display: unset;
	}
	.contact-us-button {
		display: none;
	}
}

/* Mobile Animation */
@keyframes fadeIn {
	from {
		opacity: 0;
		transform: translateY(-10px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

@media (max-width: 767px) {
   /* FIX ICON CHỮ X BỊ CHE  */
@media (max-width: 767px) {

	/* Cho header đủ chỗ cho icon */
    .header {
        overflow: visible !important;
        padding: 12px 18px !important;
    }

    /* Cho toàn bộ wrapper thoát overflow */
    .header-wrapper,
    .container,
    .header-logo {
        overflow: visible !important;
    }

    /* Căn icon xa mép phải – không bị cắt */
    .menu-toggle {
        position: relative;
        z-index: 9999;
        margin-right: 5px;
    }

    /* Quan trọng nhất: căn chỉnh thanh để tạo X không bị lệch */
    .menu-toggle span {
        display: block;
        width: 26px;
        height: 3px;
        background: #222;
        border-radius: 3px;
        transition: 0.3s ease;
        transform-origin: center center;
    }

    /* Xoay chính xác, không vượt ra ngoài */
    .menu-toggle.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
	/* Header thành flex để chia LOGO | BUTTON */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Xóa ảnh hưởng của col-lg-8 */
    .header .col-lg-8 {
        width: auto !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Nút menu luôn sát phải */
    .menu-toggle {
        margin-left: auto !important;
        margin-right: 0 !important;
        right: 0 !important;
        position: relative;
    }

    /* Căn 3 thanh ngang thẳng hàng, không lệch */
    .menu-toggle span {
        width: 26px;
        height: 3px;
        background: #222;
        display: block;
        border-radius: 2px;
    }

    /* Khi mở -> thành X, vẫn căn đúng giữa */
    .menu-toggle.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }
    .menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }
    .menu-toggle.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
}

}


</style>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const toggleBtn = document.getElementById("menuToggle");
		const navMenu = document.getElementById("navMenu");

		if (!toggleBtn || !navMenu) return;

		toggleBtn.addEventListener("click", function(e) {
			toggleBtn.classList.toggle("active");
			navMenu.classList.toggle("show");
		});

		// Đóng menu khi click link hoặc ngoài menu
		document.addEventListener("click", function(e) {
			if (!navMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
				toggleBtn.classList.remove("active");
				navMenu.classList.remove("show");
			}
		});

		document.querySelectorAll(".nav-link, .btn-dark").forEach(link => {
			link.addEventListener("click", function() {
				toggleBtn.classList.remove("active");
				navMenu.classList.remove("show");
			});
		});
	});
</script>