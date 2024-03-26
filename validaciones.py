import re 
#Importo la biblioteca re que me permite realizar operaciones con coincidencia
# de patrones tipo string tokenizer en Java 

def validar_id(id):
    if not id: #En estas sentencias if not nos sirve para verificar si algo es False, 
        #en este caso si la cadena esta vacia, si no esta vacia retorna True
        return False
    if not edad.isdigit and len(edad)>=10: #Aca verificamos que sean numeros y no pase de 10 caracteres
        return False 
    print(id)
    return True 

def validar_nombre(nombre): 
    if not nombre: 
        return False 
    if re.search("[0-9!@#$%^&*(),.?\":{}|<>]", nombre):#En cambio este metodo
        #es muy parecido al anterior, solo que este en vez de evaluar un patron en el 
        #principio de una expresión, lo hace en toda la mencionada
        return False 
    print(nombre)
    return True 

def validar_apellido(apellido): 
    if not apellido: 
        return False 
    if re.search("[0-9!@#$%^&*(),.?\":{}|<>]", apellido):
        return False 
    print(apellido)
    return True


def validar_edad(edad): 
    if not edad: 
        return False 
    if not edad.isdigit(): #Este metodo nos sirve para verificar que la cadena son números
        return False 
    print(edad)
    return True 

def validar_correo(correo): 
    if not correo: 
        return False 
    if not re.match(r"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$", correo): 
        return False 
    print(correo)
    return True 

def validar_usuario(usuario, usuarios):
    if not usuario: 
        return False 
    if usuario in usuarios:
        return False
    print(usuario) 
    return True 

def validar_contrasenha(contraseña): 
    if not contraseña:
        return False
    print(contraseña) 
    return True

id = "4566789421"
nombre = "Juanes"
apellido = "Pereira"
edad = "30"
correo = "juan@example.com"
usuario = "juan_perez"
contraseña = "Password123!"


if validar_id(id) and \
   validar_nombre(nombre) and \
   validar_apellido(apellido) and \
   validar_edad(edad) and \
   validar_correo(correo) and \
   validar_usuario(usuario, ["usuario1", "usuario2", "juan_perez"]) and \
   validar_contrasenha(contraseña):
    print("Todos los datos son válidos.")
else:
    print("Alguno de los datos es inválido o esta vacio.")
