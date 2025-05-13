# Proyecto Multiservicios Melgar

## Desarrollo

### Instalaciones necesarias

* Instalar [Composer](https://getcomposer.org/download/)
* Instalar servidor web local como [XAMPP](https://www.apachefriends.org/es/index.html)

### Otras instalaciones
* Instalar [Git](https://git-scm.com/downloads/win)

### Configurar proyecto en XAMPP

La ruta de instalación por defecto de XAMPP es en el disco C, y el proyecto debe colocarse en la carpeta `htdocs`:

```powershell
cd C:\xampp\htdocs
```

Una vez ubicados dentro de la carpeta `htdocs/`, clonamos el repositorio con todas las ramas y commits:

```powershell
git clone <enlace-al-repositorio>
```

### Instalar dependencias de Composer

```bash
composer install
```

### Configurar archivos necesarios

Crear archivo `.env` en la raíz del proyecto (al mismo nivel del index).