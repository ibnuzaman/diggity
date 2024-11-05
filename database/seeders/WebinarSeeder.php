<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Webinar;
use App\Models\Speaker;
use App\Models\Material;
use App\Models\Chapter;
use App\Models\SubChapter;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
    
        for ($i = 0; $i < 10; $i++) {
            $webinar = new Webinar();
            $webinar->title = 'UI/UX on AI ' . ($i + 1);
            $webinar->image = 'http://example.com/image' . ($i + 1) . '.jpg';
            $webinar->webinar_date = now()->addDays($i)->toDateString();
            $webinar->start_time = '10:00:00';
            $webinar->end_time = '12:00:00';
            $webinar->meeting_room = 'Room ' . chr(65 + $i);
            $webinar->starting_price = 100.00 + ($i * 10);
            $webinar->discounted_price = 80.00 + ($i * 8);
            $webinar->final_price = 70.00 + ($i * 7);
            $webinar->description = 'An informative webinar on AI ' . ($i + 1);
            $webinar->category_id = rand(1, 10);
            $webinar->save();
    
            $speaker = new Speaker();
            $speaker->speaker_name = 'John Doe ' . ($i + 1);
            $speaker->speaker_job = 'AI Specialist ' . ($i + 1);
            $speaker->speaker_summary = 'Expert in AI and Machine Learning ' . ($i + 1);
            $speaker->company_speaker = 'Tech Corp ' . ($i + 1);
            $speaker->speaker_image = 'http://example.com/speaker' . ($i + 1) . '.jpg';
            $speaker->webinar_id = $webinar->id;
            $speaker->save();
    
            $material = new Material();
            $material->material_name = 'Material ' . ($i + 1);
            $material->webinar_id = $webinar->id;
            $material->save();
    
            $chapter = new Chapter();
            $chapter->chapter_name = 'Introduction to AI ' . ($i + 1);
            $chapter->chapter_order = $i + 1;
            $chapter->material_id = $material->id;
            $chapter->save();
    
            $sub_chapter = new SubChapter();
            $sub_chapter->sub_chapter_name = 'What is AI? ' . ($i + 1);
            $sub_chapter->sub_chapter_order = $i + 1;
            $sub_chapter->chapter_id = $chapter->id;
            $sub_chapter->save();
    
            if ($webinar->discounted_price > 0) {
            $webinar->final_price = $webinar->starting_price - $webinar->discounted_price;
            $webinar->save();
            } else {
            $webinar->final_price = $webinar->starting_price;
            $webinar->save();
            }
        }
                }
    }

