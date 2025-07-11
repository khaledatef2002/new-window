import { request } from '../../front/js/utils.js';
import RemoveManager from './remove-module.js'

class ContactUsManager {
    constructor() {
        RemoveManager.addListener(this.remove.bind(this))
        document.querySelector("body").addEventListener("click", (e) => {
            if(e.target.closest(".show_contact"))
            {
                const id = e.target.closest(".show_contact").getAttribute("data-id")
                this.show.bind(this)(id)
            }
            else if(e.target.closest(".approve"))
            {
                const id = e.target.closest(".approve").getAttribute("data-id")
                this.approve.bind(this)(id)
            }
            else if(e.target.closest(".declince"))
            {
                const id = e.target.closest(".declince").getAttribute("data-id")
                this.declince.bind(this)(id)
            }
        })
        if(document.querySelector("#contactMessage"))
        {
            this.model = new bootstrap.Modal(document.querySelector("#contactMessage"))
        }
    }

    async show(id)
    {
        const response = await request(`/dashboard/contact-us/${id}`)
        if(response.success) {
            document.querySelector("#contactMessage .full_name").innerHTML = response.data.contact_us.full_name
            document.querySelector("#contactMessage .email").innerHTML = response.data.contact_us.email
            document.querySelector("#contactMessage .phone_number").innerHTML = response.data.contact_us.phone_number
            document.querySelector("#contactMessage .site_url").innerHTML = response.data.contact_us.site_url
            document.querySelector("#contactMessage .message").innerHTML = response.data.contact_us.message
            this.model.show()
        }
        else
        {
            this.show_error(response.message)
        }
    }

    async approve(id)
    {
        const response = await request(`/dashboard/contact-us/${id}/approve`, 'PUT')
        if(response.success) {
            this.show_success(response.data.message)
            table.ajax.reload(null, false)
        } else {
            this.show_error(response.message)
        }
    }

    async declince(id)
    {
        const response = await request(`/dashboard/contact-us/${id}/declince`, 'PUT')
        if(response.success) {
            this.show_success(response.data.message)
            table.ajax.reload(null, false)
        } else {
            this.show_error(response.message)
        }
    }

    async remove(id)
    {
        const response = await request(`/dashboard/contact-us/${id}`, 'DELETE')
        if(response.success) {
            this.show_success(response.data.message)
            table.ajax.reload(null, false)
        } else {
            this.show_error(response.message)
        }
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

export default new ContactUsManager();