import { request } from './utils.js';

class PortofoliosManager {
    constructor() {
        this.Limit = 20

        this.getingPortofolioLoader = document.querySelector(".PortofolioLoader")

        this.portofolio_container = document.querySelector("#porto-data")
        if(this.portofolio_container)
        {
            this.display_portofolios()
        }

        this.get_portofolios_working = false
    }

    async display_portofolios() {
        window.addEventListener('scroll', async () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200 && !this.get_portofolios_working) {
                await this.get_portofolios()
            }
        });
    }

    async get_portofolios()
    {
        this.get_portofolios_working = true
        this.getingPortofolioLoader.style.display = "flex"
        let url = `/services/${SERVICE_ID}/portofoliols/${LastPortofolioId}/${this.Limit}`

        const result = await request(url)

        if(result.success)
        {
            LastPortofolioId = result.data.last_portofolio_id
            this.getingPortofolioLoader.insertAdjacentHTML('beforebegin', result.data.content)
            this.getingPortofolioLoader.style.display = "none"
            this.get_portofolios_working = false
        }
        else
        {

            this.getingPortofolioLoader.innerHTML = `<p class="fw-bold mb-0 fs-5">لا يوجد نتائج اخرى</p>`
        }
    }
}

export default new PortofoliosManager();