<?php genheader("Detecting motor phasing from back-EMF", "October 8, 2024");?>

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
    Each hall sensor is detecting the presence of magnetic flux in its preferred direction. A hall sensor is ether ON or OFF, so it is a digital signal. Because each hall sensor is spaced 120 ELECTRICAL DEGREES apart (further EDEG), the waveforms they produce are also spaced with the same phase differences.
<picture  >
    <source srcset="halls.bmp" type="image/jpeg">
    <?php img("halls.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Hall signal is the three square waves with phase 0 degree, 120 degree and 240 degree.</small></i></span>

</p>


<p>
The three hall signals can be combined into a COMMUTATION STATE signal, which is always one of the integer numbers 1, 2, 3, 4, 5, 6. (It is six states, because only 2 halls are on at the same time out of 3. It is the combinatorics formula "3 choose 2", which is 6). The commutation state produces the stair step pattern as seen in the graph:
<picture  >
    <source srcset="state.bmp" type="image/jpeg">
    <?php img("state.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Each unique overlap combination is a different commutation state</small></i></span>

Each commutation state represents a 60 EDEG change of a rotor angle. Not surprising 6 commutation states produce a full 360 EDEG revolution.
</p>

<p>
The above COMMUTATION STATE graph was produced by comparing each of the three hall sensor signal with a THRESHOLD value (2.5V here) and the three resulting boolean values are fed to commutation state decoder which reduces them to an integer.
<picture>
    <source srcset="commutation_state.png" type="image/jpeg">
    <?php img("commutation_state.png", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Reducing three hall signals to single commutation state signal (LabView)</small></i></span>
</p>


<picture  >
    <source srcset="commutation_decode.png" type="image/jpeg">
    <?php img("commutation_decode.png", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Inside commutation state decoder (LabView)</small></i></span>

<p>
That is all there's to it! You can now read hall sensors. The stair up pattern indicates one direction of the motor, while stair down the opposite (exact direction depends on order of hall sensors and there's no single way). If you can detect ascending or descending pattern you can detect direction. Swapping any two phases will produce an opposite motion as in following graph: 
</p>

<!-- 
<picture  >
    <source srcset="halls2.bmp" type="image/jpeg">
    <?php img("halls2.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases appears to produce a similar hall sensor pattern</small></i></span>

 -->
<picture  >
    <source srcset="state2.bmp" type="image/jpeg">
    <?php img("state2.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Swapping any two phases produces opposite rotation</small></i></span>

<?php h("HOW TO WIRE MOTOR PHASES TO APPEAR AS (ROUGH) HALL SENSOR SIGNALS");?>

<p>
Now, let's pretend there are no hall sensors in the motor and use the the three coil sets as magnetic flux detectors. Given three DIFFERENTAIL ANALOG PROBES: AI0, AI1, AI2 attach them to motor phases in the following way:

<picture  >
    <source srcset="motor.png" type="image/jpeg">
    <?php img("motor.png", 50, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Motor phases of a delta-wound motor</small></i></span>

This will produce three hall-like signals on probes AI0, AI1, AI2. When flux increases through a coil the voltage will become positive. When it decreases it will become negative.
</p>

<p>
There are a few important differences in how coils behave as compared to hall sensors.

<ul id="id01">
  <li>Coils can only detect CHANGE in MAGNETIC FLUX</li>
  <li>Coils can detect both POSITIVE and NEGATIVE CHANGE IN FLUX</li>
  <li>Amplitude of signal depends on speed of rotation and generally much smaller</li>
  <li>The signals will center around zero</li>
</ul> 

</p>

<p>The following graph is a very idealized representation of what EMF signal from the analog probes would look like.
<picture  >
    <source srcset="emf.bmp" type="image/jpeg">
    <?php img("emf.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Sinusoidal EMF signal resemble hall sensor signals</small></i></span>
</p>

<p>
    If you run the same code as for hall sensors, except set threshold to 0V you would get the same kind of stair pattern! (In practice due to noise I needed to set threshold to around 0.1V )
<picture>
    <source srcset="emf_state.bmp" type="image/jpeg">
    <?php img("emf_state.bmp", 100, "display: block; margin-top: 2ch; margin-bottom: 2ch; margin-left: auto;margin-right: auto;");?>
  </picture>
  <span style="text-align: center; display: block; margin-bottom: 2ch;"><i><small>Decoding commutation state produces the same kind of waveform (ideally)</small></i></span>

    
</p>

<p>
    Now detecting motor direction is as easy as detecting stair up or stair down pattern. In my implementation I add all 60 EDEG deltas from each commutation state change and add them up. If the sum is positive I count it as CW direction. If the sum is negative then it is CCW direction.  
</p>

<?php h("LINKS");?>

<a href="https://github.com/evilactually/hall_effect_benchmarking/tree/dir">LabView Source Code</a>.