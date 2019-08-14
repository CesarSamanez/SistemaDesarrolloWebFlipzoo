
<head>
	<meta charset="UTF-8">
	<title>Gestión de mesas</title>
	<script type="text/javascript" src="cronometro.js"></script>

</head>


<body>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h1 class="box-title"><?php echo __('Control de Mesas'); ?></h1>

          </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
                     <table id="example1" class="table table-bordered table-striped">
   <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('Mesa') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de inicio') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de finalización') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Tiempo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Extras') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tables as $table): ?>
                <tr>
                  <td><?= $this->Number->format($table->id) ?></td>
                  <td><span id="horai<?= $table->id?>">--</span> : <span id="minutoi<?= $table->id?>">--</span> : <span id="segundoi<?= $table->id?>">--</span></td>
                  <td><span id="horaf<?= $table->id?>">--</span> : <span id="minutof<?= $table->id?>">--</span> : <span id="segundof<?= $table->id?>">--</span></td>
                  <td><span id="horas<?= $table->id?>">--</span> : <span id="minutos<?= $table->id?>">--</span> : <span id="segundos<?= $table->id?>">--</span></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller'=> 'tables', 'action' => 'view', $table->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller'=> 'tables', 'action' => 'edit', $table->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  </td>
                  <td><button type="button" id="s<?= $table->id?>" class="btn btn-outline-success" onclick="cargaMesa(this)">Iniciar</button>
              		<button type="button" id="e<?= $table->id?>" disabled="true" class="btn btn-outline-warning" onclick="detenerMesa(this)">Finalizar</button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>



</body>
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>
<?php echo $this->Html->script('cronometro.js?'.filemtime('js/cronometro.js')); ?>
