@extends('app')
@section('content')
<h1 class="welcome">Welcome {{ $name }} <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i></a></h1>
<div class="middle">
	<div class="todo-list-container">
		@if(count($data)>0)
		<h2>Your to-do List</h2>
		@foreach ($data as $todo)
		<div class="todo-{{ $todo['priority'] }}">
			<h3 class="title">{{ $todo['title'] }}</h3>
			<p class="description">{{ $todo['description'] }}</p>
			<?php $id = $todo['id'];
$str = "/home/done?id=".$id;
?>
			<a href={{ $str }}><i class="fa fa-stop"></i>
</a>
		</div>
		@endforeach
		@else
			<h2>You have no to-do for today!</h2>
		@endif
		@if(count($done)>0)
			<h2>Your done List</h2>
			@foreach ($done as $todo)
				<div class="todo-{{ $todo['priority'] }}">
				<h3 class="title">{{ $todo['title'] }}</h3>
				<p class="description">{{ $todo['description'] }}</p>
				</div>
			@endforeach
		@endif
	</div>
	<div class="calendar-container">
		<h2>Create a to-to list</h2>
		<form class="todo-new-form" role="form" method="GET" action="{{ url('/home/add') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div><input type="text" placeholder="Title" name="title" required></div>
			<div><textarea placeholder="Description" name="description" required></textarea><div>
			<select id="priSelect" name="priSelect">
					<option value=1 class="op1">Priority 1</option>
					<option value=2 class="op2">Priority 2</option>
					<option value=3 class="op3">Priority 3</option>
					<option value=4 class="op4">Priority 4</option>
					<option value=5 class="op5">Priority 5</option>
			</select>
			<input type="submit" value="Submit">
		</form>
	</div>
<?php
/* draws a calendar */
function draw_calendar($today, $month, $year, $data)
{

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	$calendar .= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">', $headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day       = date('w', mktime(0, 0, 0, $month, 1, $year));
	$days_in_month     = date('t', mktime(0, 0, 0, $month, 1, $year));
	$days_in_this_week = 1;
	$day_counter       = 0;
	$dates_array       = array();

	/* row for week one */
	$calendar .= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for ($x = 0; $x < $running_day; $x++):
		$calendar .= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar .= '<td class="calendar-day">';
		/* add in the day number */
		if ($today != $list_day)
	{
			$calendar .= '<div class="day-number">'.$list_day.'</div>';
		}
	else
	{
			$calendar .= '<div class="day-number-today">'.$list_day.'</div>';
		}

		/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/

		foreach ($data as $todo)
	{
			$dd = date('d', strtotime($todo['created_at']));
			if ($dd == $list_day)
		{
				$calendar .= str_repeat('<p> <i class="fa fa-comments"></i> </p>', 1);
				break;
			}
		}

		$calendar .= '</td>';
		if ($running_day == 6):
			$calendar .= '</tr>';
			if (($day_counter + 1) != $days_in_month):
				$calendar .= '<tr class="calendar-row">';
			endif;
			$running_day       = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++;
		$running_day++;
		$day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if ($days_in_this_week < 8):
		for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar .= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar .= '</tr>';

	/* end the table */
	$calendar .= '</table>';

	/* all done, return result */
	return $calendar;
}

/* sample usages */
echo '<h2>'.$month.' '.$year.'</h2>';
echo draw_calendar($today, $monthNum, $year, $fulldata);
?>
</div>
@endsection