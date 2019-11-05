        <div class="horizontal-links">
          <h5>Take a look around our site</h5>
          <a href="<?=SITE?>">Home</a>
            <?php
            foreach ($menuHold as $val)
            {
                echo " <a href=\"".SITE."page/{$val->seoname}\">{$val->title}</a>";
            }
            ?>  
        </div>
