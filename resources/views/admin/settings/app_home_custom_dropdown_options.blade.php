<form method="POST" action="{{ route('admin.settings.form') }}">
    @method('PUT')
    @csrf
      <div class="form-group">
    <label><b>Home - Opciones para lista de opciones personalizadas en el header</b></label>
      <input type="hidden"  name="name" value="app_home_custom_dropdown_options" >
      <input type="hidden"  name="type" value="json" >
      <input type="hidden"  name="cached" value="true" >
      <input-urls name="value_array" :urls='{{$settings['app_home_custom_dropdown_options']->value}}'></input-urls>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Editar</button>
  </form> 