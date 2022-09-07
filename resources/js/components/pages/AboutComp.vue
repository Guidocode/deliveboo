<template>
    <main>
        <div class="cg-container">

          <h1>Chi siamo</h1>

          <div>

              <h3>La storia di Deliverboo</h3>
              <p>
                  Quando 5 sviluppatori si sono trasferiti a Milano hanno trovato una città piena di ristoranti incredibili, ma sono rimasti stupiti che davvero pochi di questi consegnassero a domicilio.
                  Così è nato Deliverboo.
                  Oggi Deliverboo è al centro di un marketplace che mette in connessione clienti e ristoranti attraverso i rider.
                  L’obiettivo principale di questa connessione è facilitare un’esperienza di acquisto indimenticabile, offrendo una consegna veloce e affidabile.
              </p>
              <div class="img-box">
                    <img src="https://images.prismic.io/deliveroo/69024920-1e35-43d7-994f-266250abd9ab_78_france.jpg?auto=compress,format" alt="Storia">
                </div>
          </div>

          <div>

              <h3>I clienti</h3>
              <p>
                  Da anni lavoriamo sodo per capire cosa vogliono i clienti e per offrire una proposta adatta a loro sia a livello geografico, sia individuale.
                  Con la nostra proposta cerchiamo di offrire sempre la disponibilità, l’assortimento e l’esperienza migliore possibile, creando nel frattempo un legame emotivo con il nostro marchio.
                  Tutti noi ci sediamo a tavola e l’offerta di Deliverboo rispecchia i gusti delle persone ovunque si trovino.
              </p>
              <div class="img-box">
                    <img src="https://images.prismic.io/deliveroo/25750b97-a215-403e-bcbb-72f9f0853d87_BUCK_Deliveroo_Library-57.jpg?auto=compress,format" alt="Clienti">
                </div>
          </div>

          <div>

              <h3>I ristoranti</h3>
              <p>
                  Il nostro servizio di consegna a domicilio conta innumerevoli ristoranti, dalle catene più famose ai piccoli ristoranti indipendenti amati dai clienti a livello locale. Il nostro modello ha fatto aumentare esponenzialmente il numero di ristoranti che offrono le consegne a domicilio, spalancando le porte a un mondo di opzioni e di gusto per i clienti di tutto il mondo.
              </p>
              <div class="img-box">
                    <img src="https://images.prismic.io/deliveroo/3130e8b2-4ef1-4011-beb0-375baee1f3c7_Japanese_NL_3.jpg?auto=compress,format" alt="Ristoranti">
                </div>
          </div>

          <div>

              <h3>I rider</h3>
              <p>
                  La nostra proposta ai rider si basa su ciò che conta di più per loro: orari flessibili, guadagni buoni e sicurezza. Deliverboo è stata fra le prime piattaforme di consegne a domicilio al mondo a offrire l’assicurazione contro gli infortuni personali e un’assicurazione ulteriore per eventuali danni a cose o a terzi. La copertura è offerta a titolo gratuito e protegge i rider fin dalla loro prima consegna con Deliveroo.
              </p>
              <div class="img-box">
                    <img src="https://images.prismic.io/deliveroo/2ad27cdc-9c5a-4136-85b4-349f9ba1344f_nan_25+%281%29.JPG?auto=compress,format" alt="Rider">
                </div>
          </div>

          <div>
              <h3>I nostri <br> valori</h3>
              <p>
                  <ul>

                      <li>Mettiamo i clienti al centro di tutto</li>
                      <li>Lavoriamo come una squadra</li>
                      <li>Semplifichiamo per lavorare meglio</li>
                      <li>Non ci fermiamo mai</li>
                      <li>Otteniamo risultati concreti</li>
                  </ul>
              </p>
          </div>

        </div>
    </main>
</template>

<script>
export default {
 name: 'AboutComp'
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/front/vars';
    main{
        background-color: $soft_brown;
        padding:20px;
    }
    .cg-container{
        width: 90%;
        margin: auto;
        border-radius: 10px;
        border:2px solid black;
        padding: 25px;
        background-color:$green_salad;
        h1,h3{
            color:$orange;
            padding: 20px 0;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }
        .img-box{
            width: 80%;
            margin: 20px auto;
            border: 1px solid black;
            img{
                width: 100%;
            }
        }
        ul{
            li{
                list-style: none;
                text-align: center;
                margin: 15px 0;
            }
        }
    }



</style>
