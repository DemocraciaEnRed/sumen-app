<form method="POST" action="{{ route('admin.settings.form') }}">
    @method('PUT')
    @csrf
    <div class="form-group">
    <label><b>Home - Placeholder para lista de opciones personalizadas en el header</b></label>
      <input type="hidden"  name="name" value="app_home_custom_dropdown_placeholder" >
      <input type="hidden"  name="type" value="string" >
      <input type="hidden"  name="cached" value="true" >
      <input type="text" class="form-control" name="value" placeholder="Placeholder para lista de opciones personalizadas" maxlength="255" value="{{$settings['app_home_custom_dropdown_placeholder']->value}}">
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Editar</button>
  </form>