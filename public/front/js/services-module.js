import { request } from './utils.js';

class ServicesManager {
    constructor() {
        this.Limit = 20

        this.getingServiceLoader = document.querySelector(".ServiceLoader")

        this.service_container = document.querySelector(".service-container")
        if(this.service_container)
        {
            this.display_services()
        }

        this.get_services_working = false
    }

    async display_services() {
        window.addEventListener('scroll', async () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200 && !this.get_services_working) {
                await this.get_services()
            }
        });
    }

    async get_services()
    {
        this.get_services_working = true
        this.getingServiceLoader.style.display = "flex"
        let url = `/services/${LastServiceId}/${this.Limit}`

        const result = await request(url)

        if(result.success)
        {
            LastServiceId = result.data.last_service_id
            this.getingServiceLoader.insertAdjacentHTML('beforebegin', result.data.content)
            this.getingServiceLoader.style.display = "none"
            this.get_services_working = false
        }
        else
        {

            this.getingServiceLoader.innerHTML = `<p class="fw-bold mb-0 fs-5">لا يوجد نتائج اخرى</p>`
        }
    }
}

export default new ServicesManager();