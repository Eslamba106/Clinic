<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dashboards 1 - 2
        Section::updateOrCreate(['id' => 1], ['name' => 'admin_general_dashboard', 'caption' => 'admin_general_dashboard']);
        Section::updateOrCreate(['id' => 2], ['name' => 'admin_general_dashboard_show', 'section_group_id' => 1, 'caption' => "general_dashboard_page"]);

        // Roles 3 - 7
        Section::updateOrCreate(['id' => 3], ['name' => 'roles', 'caption' => 'roles']);
        Section::updateOrCreate(['id' => 4], ['name' => 'show_roles', 'section_group_id' => 3, 'caption' => 'show_roles']);
        Section::updateOrCreate(['id' => 5], ['name' => 'create_roles', 'section_group_id' => 3, 'caption' => 'create_roles']);
        Section::updateOrCreate(['id' => 6], ['name' => 'edit_roles', 'section_group_id' => 3, 'caption' => 'edit_roles']);
        Section::updateOrCreate(['id' => 7], ['name' => 'update_roles', 'section_group_id' => 3, 'caption' => 'update_roles']);
        Section::updateOrCreate(['id' => 8], ['name' => 'delete_roles', 'section_group_id' => 3, 'caption' => 'delete_roles']);

        // Users Management 9 - 15

        Section::updateOrCreate(['id' => 9], ['name' => 'user_management', 'caption' => 'user_management']);
        Section::updateOrCreate(['id' => 10], ['name' => 'all_users', 'section_group_id' => 9, 'caption' => 'show_all_users']);
        Section::updateOrCreate(['id' => 11], ['name' => 'change_users_role', 'section_group_id' => 9, 'caption' => 'change_users_role']);
        Section::updateOrCreate(['id' => 12], ['name' => 'change_users_status', 'section_group_id' => 9, 'caption' => 'change_users_status']);
        Section::updateOrCreate(['id' => 13], ['name' => 'delete_user', 'section_group_id' => 9, 'caption' => 'delete_user']);
        Section::updateOrCreate(['id' => 14], ['name' => 'edit_user', 'section_group_id' => 9, 'caption' => 'edit_user']);
        Section::updateOrCreate(['id' => 15], ['name' => 'create_user', 'section_group_id' => 9, 'caption' => 'create_user']);
        
    
        // Clinics Management 16 - 22
        Section::updateOrCreate(['id' => 16], ['name' => 'clinic_management', 'caption' => 'clinic_management']);
        Section::updateOrCreate(['id' => 17], ['name' => 'all_clinics', 'section_group_id' => 16, 'caption' => 'show_all_clinics']);
        Section::updateOrCreate(['id' => 18], ['name' => 'create_clinic', 'section_group_id' => 16, 'caption' => 'create_clinic']);
        Section::updateOrCreate(['id' => 19], ['name' => 'show_clinic', 'section_group_id' => 16, 'caption' => 'show_clinic']);
        Section::updateOrCreate(['id' => 20], ['name' => 'change_clinics_status', 'section_group_id' => 16, 'caption' => 'change_clinics_status']);
        Section::updateOrCreate(['id' => 21], ['name' => 'delete_clinic', 'section_group_id' => 16, 'caption' => 'delete_clinic']);
        Section::updateOrCreate(['id' => 22], ['name' => 'edit_clinic', 'section_group_id' => 16, 'caption' => 'edit_clinic']);
        
    
    
        // Doctors Management 23 - 29
        Section::updateOrCreate(['id' => 23], ['name' => 'doctor_management', 'caption' => 'doctor_management']);
        Section::updateOrCreate(['id' => 24], ['name' => 'change_doctors_role', 'section_group_id' => 23, 'caption' => 'change_doctors_role']);
        Section::updateOrCreate(['id' => 25], ['name' => 'change_doctors_status', 'section_group_id' => 23, 'caption' => 'change_doctors_status']);
        Section::updateOrCreate(['id' => 26], ['name' => 'delete_doctor', 'section_group_id' => 23, 'caption' => 'delete_doctor']);
        Section::updateOrCreate(['id' => 27], ['name' => 'edit_doctor', 'section_group_id' => 23, 'caption' => 'edit_doctor']);
        Section::updateOrCreate(['id' => 28], ['name' => 'create_doctor', 'section_group_id' => 23, 'caption' => 'create_doctor']);
        Section::updateOrCreate(['id' => 29], ['name' => 'all_doctors', 'section_group_id' => 23, 'caption' => 'show_all_doctors']);
        
    
    
        // // Test Method Management 30- 36
        // Section::updateOrCreate(['id' => 30], ['name' => 'result_type_management', 'caption' => 'result_type_management']);
        // Section::updateOrCreate(['id' => 31], ['name' => 'change_result_types_status', 'section_group_id' => 30, 'caption' => 'change_result_types_status']);
        // Section::updateOrCreate(['id' => 32], ['name' => 'delete_result_type', 'section_group_id' => 30, 'caption' => 'delete_result_type']);
        // Section::updateOrCreate(['id' => 33], ['name' => 'edit_result_type', 'section_group_id' => 30, 'caption' => 'edit_result_type']);
        // Section::updateOrCreate(['id' => 34], ['name' => 'create_result_type', 'section_group_id' => 30, 'caption' => 'create_result_type']);
        // Section::updateOrCreate(['id' => 35], ['name' => 'change_result_types_role', 'section_group_id' => 30, 'caption' => 'change_result_types_role']);
        // Section::updateOrCreate(['id' => 36], ['name' => 'all_result_types', 'section_group_id' => 30, 'caption' => 'show_all_result_types']);
        
    
    
        // // Sample Management 37 - 42  
        // Section::updateOrCreate(['id' => 37], ['name' => 'sample_management', 'caption' => 'sample_management']);
        // Section::updateOrCreate(['id' => 38], ['name' => 'change_samples_status', 'section_group_id' => 37, 'caption' => 'change_samples_status']);
        // Section::updateOrCreate(['id' => 39], ['name' => 'delete_sample', 'section_group_id' => 37, 'caption' => 'delete_sample']);
        // Section::updateOrCreate(['id' => 40], ['name' => 'edit_sample', 'section_group_id' => 37, 'caption' => 'edit_sample']);
        // Section::updateOrCreate(['id' => 41], ['name' => 'create_sample', 'section_group_id' => 37, 'caption' => 'create_sample']);
        // Section::updateOrCreate(['id' => 42], ['name' => 'all_samples', 'section_group_id' => 37, 'caption' => 'show_all_samples']);
        
    
        // // Plant Management 43 -  45
        // Section::updateOrCreate(['id' => 43], ['name' => 'plant_management', 'caption' => 'plant_management']);
        // Section::updateOrCreate(['id' => 44], ['name' => 'change_plants_status', 'section_group_id' => 43, 'caption' => 'change_plants_status']);
        // Section::updateOrCreate(['id' => 45], ['name' => 'delete_plant', 'section_group_id' => 43, 'caption' => 'delete_plant']);
        // Section::updateOrCreate(['id' => 46], ['name' => 'edit_plant', 'section_group_id' => 43, 'caption' => 'edit_plant']);
        // Section::updateOrCreate(['id' => 47], ['name' => 'create_plant', 'section_group_id' => 43, 'caption' => 'create_plant']);
        // Section::updateOrCreate(['id' => 48], ['name' => 'all_plants', 'section_group_id' => 43, 'caption' => 'show_all_plants']);
        
    
        
    
        // // Toxic Degrees Management 49 -  54
        // Section::updateOrCreate(['id' => 49], ['name' => 'toxic_degree_management', 'caption' => 'toxic_degree_management']);
        // Section::updateOrCreate(['id' => 50], ['name' => 'change_toxic_degrees_status', 'section_group_id' => 49, 'caption' => 'change_toxic_degrees_status']);
        // Section::updateOrCreate(['id' => 51], ['name' => 'delete_toxic_degree', 'section_group_id' => 49, 'caption' => 'delete_toxic_degree']);
        // Section::updateOrCreate(['id' => 52], ['name' => 'edit_toxic_degree', 'section_group_id' => 49, 'caption' => 'edit_toxic_degree']);
        // Section::updateOrCreate(['id' => 53], ['name' => 'create_toxic_degree', 'section_group_id' => 49, 'caption' => 'create_toxic_degree']);
        // Section::updateOrCreate(['id' => 54], ['name' => 'all_toxic_degrees', 'section_group_id' => 49, 'caption' => 'show_all_toxic_degrees']);
        
   
        // // Submission Management 55 - 60 
        // Section::updateOrCreate(['id' => 55], ['name' => 'submission_management', 'caption' => 'submission_management']);
        // Section::updateOrCreate(['id' => 56], ['name' => 'change_submissions_status', 'section_group_id' => 55, 'caption' => 'change_submissions_status']);
        // Section::updateOrCreate(['id' => 57], ['name' => 'delete_submission', 'section_group_id' => 55, 'caption' => 'delete_submission']);
        // Section::updateOrCreate(['id' => 58], ['name' => 'edit_submission', 'section_group_id' => 55, 'caption' => 'edit_submission']);
        // Section::updateOrCreate(['id' => 59], ['name' => 'create_submission', 'section_group_id' => 55, 'caption' => 'create_submission']);
        // Section::updateOrCreate(['id' => 60], ['name' => 'all_submissions', 'section_group_id' => 55, 'caption' => 'show_all_submissions']);
        
        // // Sample Routine Scheduler 61 - 66
        // Section::updateOrCreate(['id' => 61], ['name' => 'sample_routine_scheduler', 'caption' => 'sample_routine_scheduler']);
        // Section::updateOrCreate(['id' => 62], ['name' => 'change_sample_routine_scheduler_status', 'section_group_id' => 61, 'caption' => 'change_sample_routine_scheduler_status']);
        // Section::updateOrCreate(['id' => 63], ['name' => 'delete_sample_routine_scheduler', 'section_group_id' => 61, 'caption' => 'delete_sample_routine_scheduler']);
        // Section::updateOrCreate(['id' => 64], ['name' => 'edit_sample_routine_scheduler', 'section_group_id' => 61, 'caption' => 'edit_sample_routine_scheduler']);
        // Section::updateOrCreate(['id' => 65], ['name' => 'create_sample_routine_scheduler', 'section_group_id' => 61, 'caption' => 'create_sample_routine_scheduler']);
        // Section::updateOrCreate(['id' => 66], ['name' => 'all_sample_routine_scheduler', 'section_group_id' => 61, 'caption' => 'show_all_sample_routine_scheduler']);
        // // Frequency Management 67 - 72
        // Section::updateOrCreate(['id' => 67], ['name' => 'frequency_management', 'caption' => 'frequency_management']);
        // Section::updateOrCreate(['id' => 68], ['name' => 'change_frequencies_status', 'section_group_id' => 67, 'caption' => 'change_frequencies_status']); 
        // Section::updateOrCreate(['id' => 69], ['name' => 'delete_frequency', 'section_group_id' => 67, 'caption' => 'delete_frequency']);
        // Section::updateOrCreate(['id' => 70], ['name' => 'edit_frequency', 'section_group_id' => 67, 'caption' => 'edit_frequency']);
        // Section::updateOrCreate(['id' => 71], ['name' => 'create_frequency', 'section_group_id' => 67, 'caption' => 'create_frequency']);
        // Section::updateOrCreate(['id' => 72], ['name' => 'all_frequencies', 'section_group_id' => 67, 'caption' => 'show_all_frequencies']);
        
        // // Results Management 73 - 78
        // Section::updateOrCreate(['id' => 73], ['name' => 'result_management', 'caption' => 'result_management']);
        // Section::updateOrCreate(['id' => 74], ['name' => 'change_results_status', 'section_group_id' => 73, 'caption' => 'change_results_status']);
        // Section::updateOrCreate(['id' => 75], ['name' => 'delete_result', 'section_group_id' => 73, 'caption' => 'delete_result']);
        // Section::updateOrCreate(['id' => 76], ['name' => 'edit_result', 'section_group_id' => 73, 'caption' => 'edit_result']); 
        // Section::updateOrCreate(['id' => 77], ['name' => 'create_result', 'section_group_id' => 73, 'caption' => 'create_result']);
        // Section::updateOrCreate(['id' => 78], ['name' => 'all_results', 'section_group_id' => 73, 'caption' => 'show_all_results']);
        
        // // Coa Management 79 - 85
        // Section::updateOrCreate(['id' => 79], ['name' => 'coa_management', 'caption' => 'coa_management']);
        // Section::updateOrCreate(['id' => 80], ['name' => 'change_coas_status', 'section_group_id' => 79, 'caption' => 'change_coas_status']);
        // Section::updateOrCreate(['id' => 81], ['name' => 'delete_coa', 'section_group_id' => 79, 'caption' => 'delete_coa']);
        // Section::updateOrCreate(['id' => 82], ['name' => 'edit_coa', 'section_group_id' => 79, 'caption' => 'edit_coa']); 
        // Section::updateOrCreate(['id' => 83], ['name' => 'create_coa', 'section_group_id' => 79, 'caption' => 'create_coa']);
        // Section::updateOrCreate(['id' => 84], ['name' => 'all_coas', 'section_group_id' => 79, 'caption' => 'show_all_coas']);
        // Section::updateOrCreate(['id' => 85], ['name' => 'coa_settings', 'section_group_id' => 79, 'caption' => 'coa_settings']);
    
        
        // // Emails 86 - 90
        // Section::updateOrCreate(['id' => 86], ['name' => 'emails', 'caption' => 'emails']);
        // Section::updateOrCreate(['id' => 87], ['name' => 'delete_email', 'section_group_id' => 86, 'caption' => 'delete_email']);
        // Section::updateOrCreate(['id' => 88], ['name' => 'edit_email', 'section_group_id' => 86, 'caption' => 'edit_email']); 
        // Section::updateOrCreate(['id' => 89], ['name' => 'create_email', 'section_group_id' => 86, 'caption' => 'create_email']);
        // Section::updateOrCreate(['id' => 90], ['name' => 'all_emails', 'section_group_id' => 86, 'caption' => 'show_all_emails']);
    
        
        // // coa generation settings 91 - 955
        // Section::updateOrCreate(['id' => 91], ['name' => 'coa_generation_settings', 'caption' => 'coa_generation_settings']);
        // Section::updateOrCreate(['id' => 92], ['name' => 'delete_coa_generation_setting', 'section_group_id' => 91, 'caption' => 'delete_coa_generation_setting']);
        // Section::updateOrCreate(['id' => 93], ['name' => 'edit_coa_generation_setting', 'section_group_id' => 91, 'caption' => 'edit_coa_generation_setting']); 
        // Section::updateOrCreate(['id' => 94], ['name' => 'create_coa_generation_setting', 'section_group_id' => 91, 'caption' => 'create_coa_generation_setting']);
        // Section::updateOrCreate(['id' => 95], ['name' => 'all_coa_generation_settings', 'section_group_id' => 91, 'caption' => 'show_all_emails']);
    
    }
}
