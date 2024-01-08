<style>
    @media (max-width: 1520px) {
        .friday,
        .friday {
            display: none !important;
        }
    }
    @media (max-width: 1185px) {
        .thursday,
        .thursday{
            display: none !important;
        }
    }
    @media (max-width: 620px) {
        .wednesday,
        .wednesday{
            display: none !important;
        }
    }
    @media (max-width: 220px) {
        .tuesday,
        .tuesday{
            display: none !important;
        }
    }
    
    #row-1 {
        height: calc(100vh - 80px);
    }
    .breaker {
        height: 0px;
    }
    .lesson-schedule {
    }
    .ls-head {
        border-bottom: 1px black solid;
    }
    .ls-th {
        min-width: 200px;
        padding: 20px;
    }
    .ls-body {

    }
    .ls-td .activity {
        margin: auto;
        margin-top: 10px;
        width: 95%;
        border-radius: 10px;
        border: 1px#d2d2d2 solid;
        max-height: 200px;
        max-width: 200px;

        overflow-y: auto;
    }
    .ls-td .activity * {
        width: 90%;
        margin: auto;
        text-align: left;
        font-size: 11pt;
    }
    .ls-td .activity p {
        margin: 0;
    }
    .ls-td .activity .activity-title {
        margin-top: 10px;
        margin-bottom: 2px;
        font-weight: bold;
        align-self: center;
    }
    .ls-td .activity .line, .line-small{
        background-color: #d2d2d2;
        margin: auto;
        width: 90%;
    }
    .prof {
        padding-bottom: 10px;
    }
    .room {
        color: white;
        padding-left: 2px;
        padding-right: 2px;

        border-radius: 6px;
        background-color: #ff4949;
    }
    
    .activity-time-stamps {
        font-weight: 600;
        width: 100% !important;
        color: #ff0000;
    }
    .activity-title-bar {
        padding-top: 4px;
    }
</style>
<x-_dossier :pageName="$pageName" :student="$student">
    @php
    $schedule = json_decode($student->pluck('weekschema'));
    @endphp
    <div class="content">
        <div class="row d-flex flex-wrap" id="row-1">
            <div class="col-12 col-md-2 shadow justify-center">
                <h1>Column 1</h1>
            </div>
            <div class="breaker w-100 d-block d-md-none"></div>
            <div class="col-12 col-md-8 justify-center">
                <table class="lesson-schedule">
                    <thead class="ls-head text-center">
                        <th class="ls-th monday">Monday</th>
                        <th class="ls-th tuesday">Tuesday</th>
                        <th class="ls-th wednesday">Wednesday</th>
                        <th class="ls-th thursday">Thursday</th>
                        <th class="ls-th friday">Friday</th>
                    </thead>
                    <tbody class="ls-body">
                        <?php 
                        $i = 0;    
                        ?>
                        <?php foreach ($student->getPhpSchedule() as $day): ?>
                            <?php 
                            $classes = '';
                            $classes = ["monday", "tuesday", "wednesday", "thursday", "friday"][$i];
                            echo '<td class="ls-td '.$classes.'">';
                            $i += 1;
                            ?>
                            
                                <div class="day-card">
                                    <?php
                                        foreach ($day as $activity) {
                                            $startH = $activity['start-h'];
                                            $startM = $activity['start-m'];
                                            $title = $activity['title'];
                                            $description = $activity['description'];
                                            $ifNotes = '';
                                            if(isset($activity['personal-notes'])) {
                                                $notes = implode('<br>', $activity['personal-notes']);
                                                $ifNotes = '<div class="notes">'.$notes.'</div>
                                                            <hr class="line">';
                                            }
                                            $room = $activity['room'];
                                            $professor = $activity['teacher'];
                                            $endH = $activity['end-h'];
                                            $endM = $activity['end-m'];
                                            
                                            echo '<div class="activity d-flex-column justify-content-center">';
                                            echo '   <div class="activity-title-bar d-flex"><p class="activity-time-stamps text-center"><span class="hour">'.$startH.'</span>:<span class="minute">'.$startM.'</span> - <span class="hour">'.$endH.'</span>:<span class="minute">'.$endM.'</span></p><p class="text-end "><span class="room">'.$room.'</span></p></div>
                                                        <hr class="line">
                                                        <div><h3 class="text-center activity-title">'.$title.'</h3></div>
                                                        <div><p class="activity-description">'.$description.'</p></div>
                                                        <hr class="line">
                                                        '.$ifNotes.'
                                                        <div><p class="prof">professor: <span class="text-nowrap">'.$professor.'</span></p></div>';

                                            echo '</div>';
                                        }
                                    ?> 
                                    </div>
                                </div>
                            </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
            <div class="col-12 col-lg-2 shadow justify-center">
                <h1>Column 3</h1>
                
            </div>
        </div>
    </div>
</x-_dossier>