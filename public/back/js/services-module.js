import { request } from '../../front/js/utils.js';
import RemoveManager from './remove-module.js'
class ServicesController {
    constructor() {
        this.create_form = document.querySelector("form#create-services-form")
        if(this.create_form) {
            this.create_form.addEventListener("submit", this.create.bind(this))
        }

        this.edit_form = document.querySelector("form#edit-services-form")
        if(this.edit_form) {
            this.edit_form.addEventListener("submit", this.edit.bind(this))
        }
        
        RemoveManager.addListener(this.remove.bind(this))
    }

    async remove(id)
    {
        const response = await request(`/dashboard/services/${id}`, 'DELETE')
        if(response.success) {
            this.show_success(response.data.message)
            table.ajax.reload(null, false)
        } else {
            this.show_error(response.message)
        }
    }

    async create(e) {
        e.preventDefault()
        this.create_form.querySelector("button[type='submit']").setAttribute("disabled", "disabled")
        
        const formData = new FormData(this.create_form)

        Dropzone.forElement(".dropzone").files?.forEach((file, index) => {
            formData.append(`files[${index}]`, file);
        });

        const response = await request('/dashboard/services', 'POST', formData)
        if(response.success) {
            this.show_success(response.data.message)
            
            location.href = response.data.redirectUrl
        } else {
            this.show_error(response.message)
        }
        this.create_form.querySelector("button[type='submit']").removeAttribute("disabled")
    }

    async edit(e) {
        e.preventDefault()

        const id = this.edit_form.getAttribute("data-id")

        this.edit_form.querySelector("button[type='submit']").setAttribute("disabled", "disabled")
        
        const formData = new FormData(this.edit_form)

        Dropzone.forElement(".dropzone").files?.forEach((file, index) => {
            formData.append(`files[${index}]`, file);
        });

        existingFiles.forEach((file, index) => {
            formData.append(`existingFiles[${index}]`, file.id)
        })

        const response = await request(`/dashboard/services/${id}`, 'PUT', formData)

        if(response.success) {
            this.show_success(response.data.message)
            
            document.querySelectorAll("#dropzone-preview li").forEach(element => {
                element.querySelector("button.btn-danger").click()
            })
            
            response.data.portofolios.forEach(file => {
                let mockFile = { 
                    name: file.file_name, 
                    size: file.file_size, 
                    dataURL: file.file_path, 
                    id: file.id 
                };
                
                Dropzone.forElement(".dropzone").emit("addedfile", mockFile);
                Dropzone.forElement(".dropzone").emit("thumbnail", mockFile, file.file_path);
                Dropzone.forElement(".dropzone").emit("complete", mockFile);
                mockFile.previewElement.classList.add('dz-complete');
            })

            existingFiles = response.data.portofolios

            document.getElementById("noAttachments").style.display = Dropzone.forElement(".dropzone").files.length + existingFiles.length === 0 ? "block" : "none"
        } else {
            this.show_error(response.message)
        }
        this.edit_form.querySelector("button[type='submit']").removeAttribute("disabled")
    }

    show_success(message) {
        Swal.fire({
            title: "تم بنجاح",
            text: message,
            icon: "success"
        });         
    }

    show_error(message) {
        Swal.fire({
            title: "حدث خطاْ",
            text: message,
            icon: "error"
        });         
    }
}

export default new ServicesController();