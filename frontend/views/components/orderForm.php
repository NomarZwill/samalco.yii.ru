<?php
  $city_out = 'в&nbsp;' . Yii::$app->params['subdomen_dec'];
  $city_out = str_replace("'", "", $city_out);
?>

<div class="order-form order-form-ext" data-context="ext" data-big-form>
  <div class="form-title"><span>Уточнить цены и наличие <?= $city_out ?> можно, заполнив форму.</span><br><span>Наш менеджер свяжется с вами в течение часа</span></div>
  <div class="form-body">
    <form data-context="ext" data-target-action="test-action" data-target-category="test-category" action="/form/index/" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group">
          <label for="name_true">Ваше имя</label>
          <input type="text" class="form-control" name="name_true" autocomplete="off" data-required>
          <input type="text" name="name" class="xxx_">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group margin_rt">
          <label for="phone">Номер телефона</label>
          <input type="text" class="form-control" name="phone" autocomplete="off" data-required data-error="Пожалуйста, введите Ваш телефон">
        </div>
        <div class="form-group">
          <label for="email">Электронная почта</label>
          <input type="text" class="form-control" name="email" autocomplete="off" data-required data-error="Пожалуйста, введите Ваш email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group margin_rt">
          <label for="org_name">Название организации с формой собственности</label>
          <input type="text" class="form-control org-name" name="org_name" autocomplete="off" data-required>
        </div>
        <div class="form-group">
          <label for="org_address">Ваш город</label>
          <input type="text" class="form-control org-address" name="org_address" autocomplete="off" data-required>
        </div>
      </div>
      <div class="form-row form-row-ext">
        <div class="form-row">
          <p><span class="alert-lol">!</span>Реквизиты <span class="green-alert">необязательны</span>, но с ними мы обрабатываем заявки в первую очередь</p>
          <div class="selector">
            <div class="select_form">Заполнить реквизиты</div>
            <div class="select_uploader">Приложить реквизиты</div>
          </div>

          <div class="form-row for-select_form form-row-25 requisites" style="display: none;">
            <div class="form-group">
              <label for="org_inn">ИНН</label>
              <input type="text" class="form-control" name="org_inn" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
            <div class="form-group">
              <label for="org_kpp">КПП</label>
              <input type="text" class="form-control" name="org_kpp" placeholder="" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
            <div class="form-group">
              <label for="org_bill">Расчетный счет</label>
              <input type="text" class="form-control" name="org_bill" placeholder="" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
            <div class="form-group">
              <label for="org_cor_bill">Кор. счет</label>
              <input type="text" class="form-control" name="org_cor_bill" placeholder="" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
          </div>
          <div class="form-row for-select_form form-row-custom requisites" style="display: none;">
            <div class="form-group">
              <label for="org_bank">Банк</label>
              <input type="text" class="form-control bank" name="org_bank" placeholder="" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="org_bank_bik">БИК в банке</label>
              <input type="text" class="form-control bank-bik" name="org_bank_bik" placeholder="" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
          </div>

          <div class="form-row for-select_uploader" style="display:none">
            <div class="form-group">
              <label class="file_upload">
                <span class="button" id="file_upload-name">Прикрепить реквизиты</span>
                <input type="file" name="files[]" id="files[]" onchange="getName(this.value);">
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group form-group-fw">
          <label for="comment">Комментарий</label>
          <textarea class="form-control" name="comment" placeholder="Оставьте Ваш вопрос или комментарий"></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Отправить заявку</button>
        </div>
        <div class="form-group">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="terms" checked data-required>
            Я согласен на обработку <a href="https://samalco.ru/agreement/">моих персональных данных</a>
          </label>
        </div>
      </div>

      <div class="g-recaptcha" data-sitekey="6LdAz-AUAAAAAPfqsfvShXH_tq5ZGKDjcj44YtCk"></div>
      <div class="text-danger" id="recaptchaError"></div>
    </form>
  </div>
  <div class="form-overlay">
    <div class="form-overlay-body">
      <p><span id="overlay-name">Username</span>, спасибо за заявку!</p>
      <p>Наш менеджер свяжется с Вами в течение часа.</p>
      <a class="close" id="hide-overlay">Понял, спасибо</a>
    </div>
    <div class="form-overlay-close"></div>
    <div class="form-overlay-bg"></div>
  </div>
</div>