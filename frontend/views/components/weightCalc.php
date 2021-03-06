<?php
if(empty($table)){ $table = $linkAttribute;}
require 'all_params.php';
#------------------ FUNCTIONS ---------------------------------------------------------------------
if(!function_exists('paramChunk')) {
  function paramChunk($arParam, $paramName, $paramTitle, $mobile=''){ ?>
    <div class="control-group">
      <label class="control-label" for="inputEmail"><?php echo $paramTitle; ?></label>
      <div class="select-outer dimension">
        <select id="<?php echo $paramName.$mobile; ?>" name="<?php echo $paramName; ?>">
          <?php
          $firstValue = 0;
          foreach ($arParam as $key => $param) {
            if(strpos($param, '-') !== false) {$param = explode('-', $param)[0];}
            $firstValue = ($firstValue==0) ? $param : $firstValue; ?>
            <option style="width:112px" value="<?php echo $param; ?>">
              <?php echo $param; ?>
            </option>
          <?php } ?>
        </select>
        <input type="number" class="editable_field" name="<?php echo $paramName.'_format'; ?>" style="" value="<?php echo $firstValue; ?>" min="0" maxlength="8">
      </div>
    </div>
  <?php }
}

if(!function_exists('paramChunkAlloy')) {
  function paramChunkAlloy($arParam, $paramName, $paramTitle, $density, $mobile=''){ ?>
    <div class="control-group">
      <label class="control-label" for="inputEmail"><?php echo $paramTitle; ?></label>
      <div class="select-outer">
        <select id="<?php echo $paramName.$mobile; ?>" name="<?php echo $paramName; ?>">
          <?php foreach ($arParam as $key => $param) { ?>
            <option style="width:112px" value="<?php echo $density[mb_strtolower($param)]; ?>">
              <?php echo $param; ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>
  <?php }
}

if(!function_exists('scriptChunk')) {
  function scriptChunk($paramTitle, $paramUnit){ 
    global $k;?>
    <script type="text/javascript">
      var k = '<?php echo $k; ?>';
      function calc(mobile) {
        yaCounter9939076.reachGoal('massa');
        var width = document.getElementById("width"+mobile);
        var depth = document.getElementById("depth"+mobile);
        var length = document.getElementById("length"+mobile);
        var alloy = document.getElementById("alloy"+mobile);
        var result = document.getElementsByClassName("calc_result")[0];
        var result2 = document.getElementsByClassName("calc_result")[1]; 
        width = parseFloat(width.options[width.selectedIndex].value);
        alloytext = String(alloy.options[alloy.selectedIndex].text);
        length = parseFloat(length.options[length.selectedIndex].value);
        alloy = parseFloat(alloy.options[alloy.selectedIndex].value);
        depth = parseFloat(depth.options[depth.selectedIndex].value);
        count = alloy*width*depth*length*k;
        count = (count/1000000).toFixed(2);
        result.innerHTML = '<?php echo $paramTitle; ?> ' + alloytext + ' - ' + count + ' <?php echo $paramUnit; ?>';
        result2.innerHTML = result.innerHTML;
      }
    </script>
  <?php }
}

if(!function_exists('scriptChunkTubing')) {
  function scriptChunkTubing($paramTitle, $paramUnit){
    global $k;?>
    <script type="text/javascript">
      var k = '<?php echo $k; ?>';
      function calc(mobile) {
        yaCounter9939076.reachGoal('massa');
        var width = document.getElementById("width"+mobile);
        var depth = document.getElementById("depth"+mobile);
        var length = document.getElementById("length"+mobile);
        var alloy = document.getElementById("alloy"+mobile);
        var result = document.getElementsByClassName("calc_result")[0];
        var result2 = document.getElementsByClassName("calc_result")[1]; 
        width = parseFloat(width.options[width.selectedIndex].value);
        alloytext = String(alloy.options[alloy.selectedIndex].text);
        length = parseFloat(length.options[length.selectedIndex].value);
        alloy = parseFloat(alloy.options[alloy.selectedIndex].value);
        depth = parseFloat(depth.options[depth.selectedIndex].value);
        r_max = width/2;
        r_min = width/2 - depth;
        pi = 3.14159265359;
        count = (pi*r_max*r_max - pi*r_min*r_min)*length*k*alloy;
        count = (count/1000000).toFixed(2);
        if(depth>=r_max){
          result.innerHTML = '<span style="color:red;">?????????????? ???? ?????????? ???????? ???????????? ???????????????? ????????????????!</span>';
          result2.innerHTML = result.innerHTML;
        } else {
          result.innerHTML = '<?php echo $paramTitle; ?> ' + alloytext + ' - ' + count + ' <?php echo $paramUnit; ?>';
          result2.innerHTML = result.innerHTML;
        }
      }
    </script>
  <?php }
}

if(!function_exists('scriptChunkRods')) {
  function scriptChunkRods($paramTitle, $paramUnit){
    global $k;?>
    <script type="text/javascript">
      var k = '<?php echo $k; ?>';
      function calc(mobile) {
        yaCounter9939076.reachGoal('massa');
        var width = document.getElementById("width"+mobile);
        var length = document.getElementById("length"+mobile);
        var alloy = document.getElementById("alloy"+mobile);
        var result = document.getElementsByClassName("calc_result")[0];
        var result2 = document.getElementsByClassName("calc_result")[1];
        width = parseFloat(width.options[width.selectedIndex].value);
        width = width/2;
        width = Math.pow(width, 2);
        alloytext = String(alloy.options[alloy.selectedIndex].text);
        length = parseFloat(length.options[length.selectedIndex].value);
        alloy = parseFloat(alloy.options[alloy.selectedIndex].value);
        count = alloy*width*length*k*3.14;
        count = (count/1000000).toFixed(2);
        console.log(count);
        result.innerHTML = '<?php echo $paramTitle; ?> ' + alloytext + ' - ' + count + ' <?php echo $paramUnit; ?>';
        result2.innerHTML = result.innerHTML;
      }
    </script>
  <?php }
}

if(!function_exists('scriptChunkProfils')) {
  function scriptChunkProfils($paramTitle, $paramUnit, $table){
    global $k;?>
    <script type="text/javascript">
      var k = '<?php echo $k; ?>';
      function calc(mobile) {
        yaCounter9939076.reachGoal('massa');
        var table = '<?php echo $table; ?>';
        var width = document.getElementById("width"+mobile);
        var length = document.getElementById("length"+mobile);
        var height = document.getElementById("height"+mobile);
        var depth = document.getElementById("depth"+mobile);
        var alloy = document.getElementById("alloy"+mobile);
        var result = document.getElementsByClassName("calc_result")[0];
        var result2 = document.getElementsByClassName("calc_result")[1];

        alloytext = String(alloy.options[alloy.selectedIndex].text);
        width = parseFloat(width.options[width.selectedIndex].value);
        length = parseFloat(length.options[length.selectedIndex].value);
        height = parseFloat(height.options[height.selectedIndex].value);
        depth = parseFloat(depth.options[depth.selectedIndex].value);
        alloy = parseFloat(alloy.options[alloy.selectedIndex].value);

        if(table == 'profil_shveller') {
          count = (2*height+width-2*depth)*depth*length*alloy*k;
        } else if(table == 'profil_tavr') {
          count = (height+width-depth)*depth*length*alloy*k;
        } else if(table == 'profil_dvutavr') {
          count = (height+2*width-2*depth)*depth*length*alloy*k;
        } else if(table == 'profil_ugolok') {
          count = (height+width-depth)*depth*length*alloy*k;
        } else if(table == 'profil_pryamougolnik') {
          count = (2*height+2*width-4*depth)*depth*length*alloy*k;
        }

        count = (count/1000000).toFixed(2);
        result.innerHTML = '<?php echo $paramTitle; ?> ' + alloytext + ' - ' + count + ' <?php echo $paramUnit; ?>';
        result2.innerHTML = result.innerHTML;
      }
    </script>
  <?php }
}

if(!function_exists('getCalcTitle')) {
  function getCalcTitle($paramTitle){ ?>
    <span class="heading">
      <?php echo $paramTitle; ?>
    </span>
  <?php }
}

if(!function_exists('getCalcBtn')) {
  function getCalcBtn($mobile=''){
    $id = 'result'.$mobile;?>
    <span id="<?php echo $id; ?>" class="calc_result"></span>
    <button id="btn" onclick="calc('<?php echo $mobile; ?>')">????????????????????</button>
  <?php }
}
#------------------ FUNCTIONS END -----------------------------------------------------------------

if ($mobile == '1') {
  $prefix = '_m';
  $id_anchor = '';
} else {
  $prefix = '';
  $id_anchor = 'id="to_calc"';
}

// if (!isset($table)) $table = $modx->getPlaceholder("parent_link_atributes");
// $table = str_replace("'", "", $table);

if ($table == 'lists') {
  getCalcTitle('???????????? ?????????? ????????????');
  scriptChunk('?????????? ??????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['depth'], 'depth', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if ($table == 'lists_ribbed') {
  getCalcTitle('???????????? ?????????? ????????????');
  scriptChunk('?????????? ??????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['depth'], 'depth', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if ($table == 'plates') {
  getCalcTitle('???????????? ?????????? ????????');
  scriptChunk('?????????? ??????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['depth'], 'depth', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if ($table == 'tapes') {
  getCalcTitle('???????????? ?????????? ????????');
  scriptChunk('?????????? ??????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['depth'], 'depth', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if ($table == 'tubes') {
  getCalcTitle('???????????? ?????????? ????????');
  scriptChunkTubing('?????????? ??????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['diameter'], 'width', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['width_st'], 'depth', '?????????????? ????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if ($table == 'rods') {
  getCalcTitle('???????????? ?????????? ??????????????');
  scriptChunkRods('?????????? ????????????', '????');
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys[$table]['diameter'], 'width', '??????????????, ????', $prefix);
  paramChunk($arrAlloys[$table]['length'], 'length', '??????????, ????', $prefix);
  asort($arrAlloys[$table]['alloy']);
  paramChunkAlloy($arrAlloys[$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if($table == "profil_shveller"){
  getCalcTitle('???????????? ?????????? ????????????????');
  scriptChunkProfils('?????????? ????????????????', '????', $table);
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys['profils'][$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['length'], 'length', '??????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['height'], 'height', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['depth'], 'depth', '??????????????, ????', $prefix);
  asort($arrAlloys['profils'][$table]['alloy']);
  paramChunkAlloy($arrAlloys['profils'][$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if($table == "profil_tavr"){
  getCalcTitle('???????????? ?????????? ??????????');
  scriptChunkProfils('?????????? ??????????', '????', $table);
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys['profils'][$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['length'], 'length', '??????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['height'], 'height', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['depth'], 'depth', '??????????????, ????', $prefix);
  asort($arrAlloys['profils'][$table]['alloy']);
  paramChunkAlloy($arrAlloys['profils'][$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if($table == "profil_dvutavr"){
  getCalcTitle('???????????? ?????????? ????????????????');
  scriptChunkProfils('?????????? ????????????????', '????', $table);
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys['profils'][$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['length'], 'length', '??????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['height'], 'height', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['depth'], 'depth', '??????????????, ????', $prefix);
  asort($arrAlloys['profils'][$table]['alloy']);
  paramChunkAlloy($arrAlloys['profils'][$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if($table == "profil_ugolok"){
  getCalcTitle('???????????? ?????????? ????????????');
  scriptChunkProfils('?????????? ????????????', '????', $table);
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys['profils'][$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['length'], 'length', '??????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['height'], 'height', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['depth'], 'depth', '??????????????, ????', $prefix);
  asort($arrAlloys['profils'][$table]['alloy']);
  paramChunkAlloy($arrAlloys['profils'][$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
} else if($table == "profil_pryamougolnik"){
  getCalcTitle('???????????? ?????????? ????????????????????????????&nbsp;??????????????');
  scriptChunkProfils('?????????? ???????????????????????????? ??????????????', '????', $table);
  echo '<div '. $id_anchor .' class="calcform">';
  paramChunk($arrAlloys['profils'][$table]['width'], 'width', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['length'], 'length', '??????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['height'], 'height', '????????????, ????', $prefix);
  paramChunk($arrAlloys['profils'][$table]['depth'], 'depth', '??????????????, ????', $prefix);
  asort($arrAlloys['profils'][$table]['alloy']);
  paramChunkAlloy($arrAlloys['profils'][$table]['alloy'], 'alloy', '??????????', $density, $prefix);
  getCalcBtn($prefix);
  echo '</div>';
}

?>
<script>
  $('.editable_field').on('change keypress', function(){
    cur_val = $(this).val();
    max_length = parseInt($(this).attr('maxlength'));

    if(cur_val.length > max_length) {
      $(this).val(cur_val.substring(0,max_length));
    }

    select = $(this).closest('.select-outer').find('select');
    select.children("option:selected").val(this.value);
  });

  $('.select-outer.dimension select').on('change click', function(){
    text = parseFloat($(this).find("option:selected").text());
    $(this).find("option:selected").val(text);
    this.nextElementSibling.value=this.value;
  });
</script>