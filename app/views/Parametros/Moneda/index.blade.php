<!-- este listado es recogida por peticion ajax -->
<h4>Listado de Monedas</h4>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6">
        <h4>
            <a href="parametros/moneda/create" class="new-item" title="Nuevo">
                <span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</span>
                <span class="label label-default"></span>            
            </a>
        </h4>
        </th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Pais</th>
            <th>Simbolo</th>
            <th colspan="2"></th>            
        </tr>
        </thead>
        <tbody>
            @foreach($Moneda as $row)
            <tr>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->pais }}</td>    
                <td>{{ $row->simbolo}}</td>    
                <td><a href="parametros/moneda/{{$row->id}}/edit" title="Editar" class="new-item"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete-ajax" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'sistema/parametros/moneda/'.$row->id,'method'=>'delete'))}}                         
                    {{ Form::close()}}
                </td>
            </tr>  
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>

