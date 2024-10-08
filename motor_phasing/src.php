<?php genheader("Detecting motor phasing from back-EMF", "September 7, 2024");?>

<ul id="id01">
  <li>FROM HALL SIGNAL TO COMMUTATION STATE</li>
  <li>Stockholm</li>
  <li>Helsinki</li>
  <li>Berlin</li>
  <li>Rome</li>
  <li>Madrid</li>
</ul>


<!-- <?php h("MOTOR TALES FROM INDUSTRY");?><p>
    As part of my job on an autonomous mower vehicle I was involved in designing a brushless motor for reel cutting units. We bought frame-less motors, which is a kind of do-it-yourself motor that comes as a kit made of stator and a rotor, perfectly useless as a motor by itself. The mechanical engineers stuck it in a metal frame, hammered a shaft into it and turned it into an actual motor. The electrical engineers (that was just me at the time) ensured the motor could be connected to an "off-the-shelf" controller. The controller needs sensors to know what the motor is doing. Since the frame-less motor did not have any hall sensors it was my job to put them there in a form of a very clever PCB. The PCB didn't do anything extraordinary by itself other than placing three hall sensors at seemingly random places. This illusion of simplicity is deceptive. The most difficult part of designing such a hall sensor PCB is understanding of motor geometry to determine the correct placement for the motor. This could be a topic for another fascinating article, but I'm merely saying it here to give you an idea that I do know what I'm talking about. I've spent many days spinning up motors all day long so that even now I get an odd sense of satisfaction when I see a motor spinning smoothly. Maybe it is because most of the motors I made did not do that or span in a wrong direction or worse tried to take my hand off.
</p> -->
<p>

<br/>
   <picture  >
    <source srcset="fluke.jpg" type="image/jpeg">
    <?php img("fluke.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Motor direction tester</small></i></span>
</p>

<picture  >
    <source srcset="halls.jpg" type="image/jpeg">
    <?php img("halls.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Hall signal is three square waves with phase 0 degree, 120 degree and 240 degree.</small></i></span>


<picture  >
    <source srcset="state.jpg" type="image/jpeg">
    <?php img("state.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Each unique overlap combination is a commutation state</small></i></span>

<picture  >
    <source srcset="commutation_decode.png" type="image/jpeg">
    <?php img("commutation_decode.png", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Commutation state decoder</small></i></span>


<picture  >
    <source srcset="halls2.jpg" type="image/jpeg">
    <?php img("halls2.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases appears to produce a similar hall sensor pattern</small></i></span>


<picture  >
    <source srcset="state2.jpg" type="image/jpeg">
    <?php img("state2.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases produces opposite rotation</small></i></span>

<?h("");?><p>
    
</p>