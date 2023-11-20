function registrarPersona(tipo){
    let cedula = document.getElementById("cedula").value
    let nombre = document.getElementById("nombre").value
    let correo = document.getElementById("correo").value

    if(!cedula || !nombre || !correo){
        alert("Asegúrese de que todos los campos hayan sido llenados.")
        return
    }

    $.ajax({
        url: 'assets/php/registrarPersona.php',
        type: 'POST',
        data: {cedula, nombre, correo, tipo},
        success: function(response){
            console.log(response)
            mostrarClientes()
            mostrarClientesSelect()
            mostrarMecanicos()
            mostrarMecanicosSelect()
        }
    })
}

//registrar vehículos.
$("#formVehiculos").on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: 'assets/php/registrarVehiculo.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
            if(response.length > 20){
                alert("Asegúrese de que todos los campos hayan sido llenados.")
            } else{
                console.log("Vehículo registrado.")
                mostrarVehiculos()
                mostrarVehiculosSelect()
            }
        }
    })
})

function registros(){
    let vehiculo = document.getElementById("vehiculo").value
    let repuestos = document.getElementById("repuestos").value
    let estado = document.getElementById("estado").value
    let mecanico = document.getElementById("mecanico").value

    if(!vehiculo || !repuestos || !estado || !mecanico){
        alert("Asegúrese de que todos los campos hayan sido llenados.")
        return
    }

    $.ajax({
        url: 'assets/php/registros.php',
        type: 'POST',
        data: {vehiculo, repuestos, estado, mecanico},
        success: function(response){
            console.log(response)
            mostrarRegistros()
        }
    })
}

function mostrarClientes(){
    $.ajax({
        url: 'assets/php/mostrarClientes.php',
        type: 'GET',
        success: function(response){
            let clientes = JSON.parse(response)
            let template = ""
            if(clientes.length === 0){
                template = `
                    <tr></tr>
                `
                $("#bodyClientes").html(template)
            } else{
                clientes.forEach(cliente => {
                    template+=`
                        <tr>
                            <td class="text-center">${cliente.id}</td>
                            <td class="text-center">${cliente.cedula}</td>
                            <td class="text-center">${cliente.nombre}</td>
                            <td class="text-center">${cliente.correo}</td>
                            <td class="text-center"><button type="button" class="btn btn-primary me-3" onclick="modificarPersona(${cliente.id})"><i class="bi bi-pencil-fill"></i></button><button type="button" class="btn btn-danger" onclick="borrarPersona(${cliente.id})"><i class="bi bi-trash-fill"></i></button></td>
                        </tr>
                    `
                    $("#bodyClientes").html(template)
                })
            }
        }
    })
}

function mostrarClientesSelect(){
    $.ajax({
        url: 'assets/php/mostrarClientes.php',
        type: 'GET',
        success: function(response){
            let clientes = JSON.parse(response)
            let template = ""
            clientes.forEach(cliente => {
                template+=`<option value="${cliente.cedula}"> ${cliente.nombre} (${cliente.cedula}) </option>`
            })
            $("#cedulaCliente").html(template)
        }
    })
}

function mostrarMecanicos(){
    $.ajax({
        url: 'assets/php/mostrarMecanicos.php',
        type: 'GET',
        success: function(response){
            let mecanicos = JSON.parse(response)
            let template = ""
            if(mecanicos.length === 0){
                template = `
                    <tr></tr>
                `
                $("#bodyMecanicos").html(template)
            }
            mecanicos.forEach(mecanico => {
                template+=`
                    <tr>
                        <td class="text-center">${mecanico.id}</td>
                        <td class="text-center">${mecanico.cedula}</td>
                        <td class="text-center">${mecanico.nombre}</td>
                        <td class="text-center">${mecanico.correo}</td>
                        <td class="text-center"><button type="button" class="btn btn-primary me-3" onclick="modificarPersona(${mecanico.id})"><i class="bi bi-pencil-fill"></i></button><button type="button" class="btn btn-danger" onclick="borrarPersona(${mecanico.id})"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                `
                $("#bodyMecanicos").html(template)
            })
        }
    })
}

function mostrarMecanicosSelect(){
    $.ajax({
        url: 'assets/php/mostrarMecanicos.php',
        type: 'GET',
        success: function(response){
            let mecanicos = JSON.parse(response)
            let template = ""
            if(mecanicos.length === 0){
                template = `
                    <option></option>
                `
                $("#mecanico").html(template)
            } else{
                mecanicos.forEach(mecanico => {
                    template+=`<option value="${mecanico.cedula}"> ${mecanico.nombre} (${mecanico.cedula}) </option>`
                })
                $("#mecanico").html(template)
            }
        }
    })
}

function mostrarVehiculos(){
    $.ajax({
        url: 'assets/php/mostrarVehiculos.php',
        type: 'GET',
        success: function(response){
            let vehiculos = JSON.parse(response)
            let template = ""
            if(vehiculos.length === 0){
                template = `
                    <tr></tr>
                `
                $("#bodyVehiculos").html(template)
            } else{
                vehiculos.forEach(vehiculo => {
                    template+=`
                        <tr>
                            <td class="text-center">${vehiculo.matricula}</td>
                            <td class="text-center">${vehiculo.descripcion}</td>
                            <td class="text-center"><img src="${vehiculo.imagen}" width=80px height=auto></td>
                            <td class="text-center">${vehiculo.marca}</td>
                            <td class="text-center">${vehiculo.modelo}</td>
                            <td class="text-center">${vehiculo.tipo}</td>
                            <td class="text-center">${vehiculo.year}</td>
                            <td class="text-center">${vehiculo.clasificacion}</td>
                            <td class="text-center">${vehiculo.cedulaCliente}</td>
                        </tr>
                    `
                    
                })
                $("#bodyVehiculos").html(template)
            }
        }
    })
}

function mostrarVehiculosSelect(){
    $.ajax({
        url: 'assets/php/mostrarVehiculos.php',
        type: 'GET',
        success: function(response){
            let vehiculos = JSON.parse(response)
            let template = ""
            if(vehiculos.length === 0){
                template = `
                    <option></option>
                `
                $("#vehiculo").html(template)
            } else{
                vehiculos.forEach(vehiculo => {
                    template+=`<option value="${vehiculo.matricula}"> ${vehiculo.marca} (${vehiculo.matricula}) </option>`
                })
                $("#vehiculo").html(template)
            }
        }
    })
}

function mostrarRegistros(){
    $.ajax({
        url: 'assets/php/mostrarRegistros.php',
        type: 'GET',
        success: function(response){
            let registros = JSON.parse(response)
            let template = ""
            if(registros.length === 0){
                template = `<tr></tr>`
                $("#bodyRegistros").html(template)
            } else{
                registros.forEach(registro =>{
                    template+=`
                    <tr>
                        <td class="text-center">${registro.id}</td>
                        <td class="text-center">${registro.vehiculo}</td>
                        <td class="text-center">${registro.repuesto}</td>
                        <td class="text-center">${registro.estado}</td>
                        <td class="text-center">${registro.mecanico}</td>
                        <td class="text-center">a</td>
                    </tr>
                    `
                    $("#bodyRegistros").html(template)
                })
            }
        }
    })
}

function reporteClientes(){
    $.ajax({
        url: 'assets/php/reporteClientes.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/reporteClientes.php')
        }
    })
}

function reporteMecanicos(){
    $.ajax({
        url: 'assets/php/reporteMecanicos.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/reporteMecanicos.php')
        }
    })
}

function reporteRegistros(){
    $.ajax({
        url: 'assets/php/reporteRegistros.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/reporteRegistros.php')
        }
    })
}