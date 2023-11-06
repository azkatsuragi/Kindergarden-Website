<?php
include ('dbconnect.php');
include 'smartsession.php';
include 'headerguardian.php';
if(!session_id())
{
    session_start();
}

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <table class='mt-4 table table-bordered'>
	            <div class="text-center lh-1 mb-2">
                    <h6 class="fw-bold">Little Explorer 2023</h6>
                </div>
        	</table>
            <table class="mt-4 table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Item (To be paid Anually)</th>
                        <th scope="col">Amount (RM)</th>
                     </tr>
                </thead>
            	<tbody>
                    <tr>
                        <th scope="row">Registration Fee</th>
                        <td>280.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Sports Attire/Uniform</th>
                        <td>40.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Play and Learn Session (Brain Gym, Sensory Gym, Read Aloud, Arts & Creative, Logic & Thinking, Musical)</th>
                        <td>200.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Tadabbur Al-Quran worksheet, Hadith worksheet, Tauhidic Science</th>
                        <td>120.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Routine Apps</th>
                        <td>70.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Little Thinker Activity</th>
                        <td>100.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Playgroup Day</th>
                        <td>100.00</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Mengaji + Record Book Fee</th>
                        <td>40.00</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Afternoon Playtime (Art & Craative, Sensory Therapy, Physical Therapy)</th>
                        <td>50.00</td>
                    </tr>
                    <tr class="border-top table-secondary">
                        <th scope="row">Total for Half Day</th>
                        <td>910.00</td>
                    </tr>
                    <tr class="border-top table-primary">
                        <th scope="row">Total for Full Day</th>
                        <td>1000.00</td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-4 table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Item (To be paid Monthly)</th>
                        <th scope="col">Amount (RM)</th>
                     </tr>
                </thead>
                <tbody>
                    <tr class="table-secondary">
                        <td>Half Day</td>
                        <td>250</td>
                    </tr>
                    <tr class="table-primary">
                        <td>Full Day</td>
                        <td>420</td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-4 table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Meals</th>
                        <th scope="col">Amount (RM)</th>
                     </tr>
                </thead>
                <tbody>
                    <tr class="table-secondary">
                        <td>Half Day: Breakfast</td>
                        <td>720</td>
                    </tr>
                    <tr class="table-primary">
                        <td>Full Day: Breakfast + Lunch</td>
                        <td>1440</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footeradmin.php'; ?>