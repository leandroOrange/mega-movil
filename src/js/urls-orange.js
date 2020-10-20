const wrapperList = document.querySelector("#wrapper-list")
const cities = [
  "leon",
  "queretaro",
  "nicolas-romero",
  "toluca",
  "veracruz",
  "torreon",
  "guadalajara",
  "tepic",
  "culiacan",
  "tuxtla",
  "puebla",
  "morelia",
  "hermosillo",
  "durango",
  "xalapa",
  "mochis",
  "mazatlan",
  "obregon",
  "guaymas",
]
const orangeCamp = [
  "display",
  "fb-branding",
  "fb-breach",
  "fb-conversions",
  "fb-trafico",
  "video",
]

function renderList(cities, camps) {
  cities.forEach((city) => {
    let title = document.createElement("h5")
    let text = document.createTextNode(city)
    title.appendChild(text)
    wrapperList.appendChild(title)

    camps.forEach((campaignName) => {
      let link = document.createElement("a")
      let text = document.createTextNode(
        `https://megacable-promociones.com.mx/mega-movil/?campaign=${campaignName}&city=${city}&ag=or&page=entry`
      )
      link.appendChild(text)
      link.href = `https://megacable-promociones.com.mx/mega-movil/?campaign=${campaignName}&city=${city}&ag=or&page=entry`
      link.target = "_blank"
      wrapperList.appendChild(link)
    })
  })
}

renderList(cities, orangeCamp)
