<?php genheader("Detecting motor phasing from back-EMF", "September 7, 2024");?>

<!-- <ul id="id01">
  <li>FROM HALL SIGNAL TO COMMUTATION STATE</li>
  <li>Stockholm</li>
  <li>Helsinki</li>
  <li>Berlin</li>
  <li>Rome</li>
  <li>Madrid</li>
</ul> -->


<!-- <?php h("MOTOR TALES FROM INDUSTRY");?><p>
    As part of my job on an autonomous mower vehicle I was involved in designing a brushless motor for reel cutting units. We bought frame-less motors, which is a kind of do-it-yourself motor that comes as a kit made of stator and a rotor, perfectly useless as a motor by itself. The mechanical engineers stuck it in a metal frame, hammered a shaft into it and turned it into an actual motor. The electrical engineers (that was just me at the time) ensured the motor could be connected to an "off-the-shelf" controller. The controller needs sensors to know what the motor is doing. Since the frame-less motor did not have any hall sensors it was my job to put them there in a form of a very clever PCB. The PCB didn't do anything extraordinary by itself other than placing three hall sensors at seemingly random places. This illusion of simplicity is deceptive. The most difficult part of designing such a hall sensor PCB is understanding of motor geometry to determine the correct placement for the motor. This could be a topic for another fascinating article, but I'm merely saying it here to give you an idea that I do know what I'm talking about. I've spent many days spinning up motors all day long so that even now I get an odd sense of satisfaction when I see a motor spinning smoothly. Maybe it is because most of the motors I made did not do that or span in a wrong direction or worse tried to take my hand off.
</p> -->
<p>

    There's a very close correlation between the shape of back EMF of a motor and a typical hall sensor signal that can allow you to characterize motor winding. In this setup the motor is forced to turn by external torque and the back EMF is measured by three analogue probes connected between <em>U</em>, <em>V</em> and <em>W</em> phases. No hall sensors are needed. There are motor testers on the market that can do that. In this article I'm going to show how to detect motor direction from back EMF signal and compare it to a hall sensor signal. 

<br/>
   <picture  >
    <source srcset="fluke.jpg" type="image/jpeg">
    <?php img("fluke.jpg", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Motor direction tester</small></i></span>
</p>

<?php h("HOW TO DECODE MOTOR STATE FROM HALL SENSOR SIGNALS");?>

<p>
    First, it's instructive to understand how to make sense of the typical hall sensor waveforms.
</p>
<p>
    Each hall sensor is detecting the presence of magnetic flux in its preferred direction. A hall sensor is ether ON or OFF. Unlike a coil, the hall sensor can detect constant magnetic field. The coil, on the other hand, can only detect a change in magnetic flux. If the magnetic flux is in the opposite direction of its preferred direction it will be OFF. The coil can detect both positive change in flux and negative change in flux, therefore it does not have a "preferred" direction and we will see later how that affects the produced waveforms.
</p>

<p>
    Because each hall sensor is spaced 120 degrees apart, the waveforms they produce are also spaced with the same phase differences. Here I will just briefly mention that the 120 degree spacing is specified in <em>ELECTRICAL DEGREES</em> of motor cycle and not <em>MECHANICAL DEGREES</em>. Think of it as a relation between number of engine cycles versus the total distance the car moves. We don't need to talk about this distinction for detecting the direction.
<picture  >
    <source srcset="halls.bmp" type="image/jpeg">
    <?php img("halls.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Hall signal is the three square waves with phase 0 degree, 120 degree and 240 degree.</small></i></span>

</p>

<p>
    In a moving motor both the coils and rotor produce magnetic fields. To alleviate any confusion, I have to mention right away one important fact. The hall sensors are only trying to detect the fields coming from the rotor containing permanent magnets and not the coils! The coils have nothing to do with it, they just get in the way. In fact, if motors didn't have coils at all the hall sensors would work just fine. In this article I'm going to show how to use coils of a motor as a triple ad hoc magnetic flux sensor that can produce signals very similar to the hall sensor signals.
</p>

<p>
</p>

<picture  >
    <source srcset="state.bmp" type="image/jpeg">
    <?php img("state.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Each unique overlap combination is a different commutation state</small></i></span>

<picture  >
    <source srcset="commutation_decode.png" type="image/jpeg">
    <?php img("commutation_decode.png", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Inside commutation state decoder (LabView)</small></i></span>


<picture  >
    <source srcset="halls2.bmp" type="image/jpeg">
    <?php img("halls2.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases appears to produce a similar hall sensor pattern</small></i></span>


<picture  >
    <source srcset="state2.bmp" type="image/jpeg">
    <?php img("state2.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases produces opposite rotation</small></i></span>

<?php h("HOW TO WIRE MOTOR PHASES TO APPEAR AS (ROUGH) HALL SENSOR SIGNALS");?>

<picture  >
    <source srcset="motor.png" type="image/jpeg">
    <?php img("motor.png", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Motor phases of a delta-wound motor</small></i></span>

<?h("");?><p>
    
</p>