<form method="post" class="needs-validation" autocomplete="on">
   <input name="type" id="type" value="send" hidden>
    <div class="form-group required">
        <label for="user_family" class="control-label">Фамилия</label>
        <input type="text" class="form-control <?php echo isset($user_family_err)?'is-invalid':'';?>" name="user_family"
               id="user_family" value="<?php echo $user_family;?>" maxlength="50" required>
        <div class="invalid-feedback"><?php echo $user_family_err;?></div>
    </div>
    <div class="form-group required">
        <label for="user_name" class="control-label">Имя</label>
        <input type="text" class="form-control <?php echo isset($user_name_err)?'is-invalid':'';?>" name="user_name"
               id="user_name" value="<?php echo $user_name;?>" maxlength="50" required>
        <div class="invalid-feedback"><?php echo $user_name_err;?></div>
    </div>
    <div class="form-group">
        <label for="user_patronymic">Отчество</label>
        <input type="text" class="form-control <?php echo isset($user_patronymic_err)?'is-invalid':'';?>"
               name="user_patronymic" id="user_patronymic" maxlength="50" value="<?php echo $user_patronymic;?>">
        <div class="invalid-feedback"><?php echo $user_patronymic_err;?></div>
    </div>
    <div class="form-group required">
        <label for="user_patronymic" class="control-label">Пол</label>
        <select name="user_sex" id="user_sex" class="form-control">
            <option value="0">Женский</option>
            <option value="1">Мужской</option>
        </select>
    </div>
    <div class="form-group required">
        <label for="user_age" class="control-label">Возраст</label>
        <input type="text" class="form-control <?php echo isset($user_age_err)?'is-invalid':'';?>"
               name="user_age" id="user_age" value="<?php echo $user_age;?>" required>
        <div class="invalid-feedback"><?php echo $user_age_err;?></div>
    </div>
    <div class="form-group required">
        <label for="user_living_town" class="control-label">Город</label>
        <select name="user_living_town" id="user_living_town" class="form-control" >
            <?php echo $select;?>
        </select>
    </div>
    <div class="form-group required">
        <label for="user_question" class="control-label">Вопрос</label>
        <textarea class="form-control <?php echo isset($user_question_err)?'is-invalid':'';?>" aria-label="With textarea"
                  name="user_question" id="user_question" maxlength="255" required><?php echo $user_question;?></textarea>
        <div class="invalid-feedback"><?php echo $user_question_err;?></div>
    </div>
    <button type="submit" class="btn btn-primary" id="send">Отправить</button>
</form>
