@foreach($services as $service)
                        <div class="form-group">
                            <label for="description">Nombre *</label>
                            {{ $service->name }}
                        </div>
                        <div class="form-group">
                            <label for="description">Description *</label>
                            {{ $service->description }}
                        </div>
                        
                    @endforeach