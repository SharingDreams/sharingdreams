<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

?>
<style>

                .top{
                    height: 60px;
                    position: fixed;
                    margin-left:0px;
                    margin-right: 0px;
                    width: 100%;
                    background: white;
                    z-index: 9;
                    top: 0;
                    display: inline-block;
                    left: 0;
                    border-bottom: 1px solid #ccc;
                }
                @media (max-width: 389px) and (min-width: 330px){
                    .logo_img{
                        margin-left:0px !important;
                    }
                }
</style>

<div class="top">
    <div class="logo">
        <a href='/'><img src="assets/img/logo.png" class="logo_img"></a>
    </div>
    <ul class="menu_list">
        <li id="about_li"><a href="/about.php" id="menu">About</a></li>
        <li><a href="/join" id="menu">Join</a></li>
        <li><a href="/login" id="menu">Login</a></li>
    </ul>
</div>
<div style="height:60px;"></div>
<div class="middle">
    <div class="hr"></div>
        <div class="txtg_index">Help kids around the world.
            <br>
			<center>
				<a href="#" style="font-size:18px;">
					<div class="donate_button">
						About
					</div>
				</a>
			</center>
        </div>
</div>