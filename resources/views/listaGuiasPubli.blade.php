<div class="container-fluid" id="paginado_sup">
  {{ $guias->links('pagination.limit_links_rojo') }}
</div> <!-- Fin del div paginado_sup -->

<div class="container-fluid" id="resumenGuias">
  @if($guias->count() == 0)
    <h3>No se han encontrado guías</h3>
  @else
    <div class="table-responsive table-responsive-roja">
      <table class="table table-roja table-hover">
        <thead>
          <tr>
            <th>Clase</th>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Votos</th>
            <th>Comentarios</th>
            <th>Última modificación</th>
            @if ($usuario->id == Auth::user()->id)
              <th>Editar</th>
            @endif
          </tr>
        </thead>

        <tbody>
          @foreach ($guias as $guia)
            <tr>
              <td><img src="{{ asset('../storage/app/public/' .$guia->clase->foto_clase) }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
              <td><a href="{{ route('guia/show', $guia) }}">{{ $guia->nombre }}</a></td>
              <td><a href="{{ route('usuario/show', $guia->usuario) }}" class="enlace-usuario">{{ $guia->usuario->nombre }}</a></td>
              <td class="likes">{{ $guia->get_num_likes() }}</td>
              <td>{{ $guia->get_num_comentarios() }}</td>
              <td>{{ $guia->updated_at->format('d-m-Y') }}</td>
              @if ($usuario->id == Auth::user()->id)
                <th><a href="{{ route('editarGuia', [ $guia ]) }}"><span class="glyphicon glyphicon-pencil"></span></a></th>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div> <!-- Fin del div resumenGuias -->

<div class="container-fluid" id="paginado_inf">
  {{ $guias->links('pagination.limit_links_rojo') }}
</div> <!-- Fin del div paginado_inf -->
