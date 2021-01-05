@extends('level_3.3scourse.3scourses')
@section('pagetitle', 'Attandance/level3/3S/'.$course)
@section('levelcontent')
    <div>
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Date</th>
                            <th>Hours</th>
                            <th>Hall</th>
                            <th>Attendance Mark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->course_code }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>{{ $attendance->hours }}</td>
                            <td>{{ $attendance->hall }}</td>
                            {{--<td>{{ optional($attendance->student)->st_regno }}</td>--}}
                            <td>
                                @if (is_array($attendance->attendance_mark) || is_object($attendance->attendance_mark))
                                
                                    @foreach($attendance->attendance_mark as $student)
                                        {{$student}},
                                    @endforeach
                                @else
                                    {{ __('zero attendance') }}
                                @endif  
                            </td>
                            <td>
                                <form method="POST" action="{!! route('attendance_3_s__students.attendance_3_s__student.destroy', $attendance->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('attendance_3_s__students.attendance_3_s__student.show', $attendance->id ) }}" class="btn btn-info" title="Show Attendance 3 S  Student">
                                            <i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('attendance_3_s__students.attendance_3_s__student.edit', $attendance->id ) }}" class="btn btn-primary" title="Edit Attendance 3 S  Student">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Attendance 3 S  Student" onclick="return confirm(&quot;Click Ok to delete Attendance 3 S  Student.&quot;)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>                               
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{--dd($attendances)--}}
@endsection