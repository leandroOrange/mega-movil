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
  "colima",
]
const theraCamp = [
  "display",
  "fb-branding",
  "fb-breach",
  "fb-conversions",
  "fb-trafico",
  "fb-brand",
  "y-preroll",
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
        `https://megacable-promociones.com.mx/movil-buenfin/gracias.php?campaign=${campaignName}&city=${city}&ag=th&page=typ`
      )
      link.appendChild(text)
      link.href = `https://megacable-promociones.com.mx/movil-buenfin/gracias.php?campaign=${campaignName}&city=${city}&ag=th&page=typ`
      link.target = "_blank"
      wrapperList.appendChild(link)
    })
  })
}

renderList(cities, theraCamp)
