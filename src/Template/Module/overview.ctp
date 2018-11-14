
    <div class="row">
      <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
          <h1><?= ($module->title) ?></h1>
          <p> <?= ($module->description_text) ?> </p>
      </div>
    </div>


  <div class="row">

              <div class="headerbox-header">
                  <h3><?= ($module->title) ?></h3>
              </div>
              <p> <?= ($module->content) ?> </p>

  </div>

  <div class="row">
    <div class="enroll-buttons">
      <a href="/module/enroll/<?=$module->id?>" title="Title Link">
            <div class="btn btn-success">
              Enroll on <?= ($module->title) ?>
            </div>
      </a>

      <a href="/pages/home" title="Title Link">
            <div class="btn btn-danger">
              Back
            </div>
      </a>

    </div>
  </div>
