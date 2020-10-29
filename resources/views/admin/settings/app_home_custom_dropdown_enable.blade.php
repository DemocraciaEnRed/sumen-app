<form method="POST" action="{{ route('admin.settings.form') }}">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label><b>Home - Habilitar lista de opciones personalizadas en el header</b></label>
    <input type="hidden"  name="name" value="app_home_custom_dropdown_enable" >
    <input type="hidden"  name="type" value="boolean" >
    <input type="hidden"  name="cached" value="true" >
    <div class="custom-control custom-switch">
      <input type="checkbox" class="custom-control-input" name="value" id="app_home_custom_dropdown_enable_value" {{$settings['app_home_custom_dropdown_enable']->value == '1' ? 'checked' : ''}} value="1">
      <label class="custom-control-label is-clickable" for="app_home_custom_dropdown_enable_value">Activar</label>
    </div>
  </div>
  <button type="submit" class="btn btn-sm btn-primary">Editar</button>
</form>