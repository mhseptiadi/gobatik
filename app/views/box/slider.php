		<!-- Slider starts -->
		<div class="tp-banner-container">
			<div class="tp-banner">
				<ul>	<!-- SLIDE  -->
                    <?php
                    foreach ($slider as $val):
                    ?><li data-transition="slotfade-vertical" data-slotamount="7" data-masterspeed="1500"><?php
                        echo $val;
                    ?></li><?php
                    endforeach;
                    ?>

                <!-- SLIDE  -->
				</ul>
			</div>
		</div>
		<!--/ Slider ends -->
