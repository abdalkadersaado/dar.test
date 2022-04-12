<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();


        // MAIN
        $manageMain = Permission::create([
            'name' => 'main',
            'display_name_en' => 'Main',
            'description_en' => 'Administrator Dashboard',
            'display_name' => 'الرئيسية',
            'description' => 'الرئيسية',
            'route' => 'index',
            'module' => 'index',
            'as' => 'index',
            'icon' => 'fa fa-home',
            'parent' => '0',
            'parent_original' => '0',
            'sidebar_link' => '1',
            'appear' => '1',
            'ordering' => '1',
        ]);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();

        // POSTS
        $managePosts = Permission::create([
            'name' =>
            'manage_posts',
            'display_name_en' => 'Blogs',
            'display_name' => 'ادارة المقالات',
            'route' => 'posts',
            'module' => 'posts',
            'as' => 'posts.index',
            'icon' => 'fas fa-newspaper',
            'parent' => '0',
            'parent_original' => '0',
            'appear' => '1',
            'ordering' => '5',
        ]);
        $managePosts->parent_show = $managePosts->id;
        $managePosts->save();
        $showPosts = Permission::create([
            'name' => 'show_posts',
            'display_name_en' => 'Blogs',
            'display_name' => 'ادارة المقالات',
            'route' => 'posts',
            'module' => 'posts',
            'as' => 'posts.index',
            'icon' => 'fas fa-newspaper',
            'parent' => $managePosts->id,
            'parent_show' => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear' => '1',
            'ordering' => '0',
        ]);
        $createPosts = Permission::create(['name' => 'create_posts', 'display_name' => 'انشاء مقال', 'display_name_en' => 'Create Blog', 'route' => 'posts/create', 'module' => 'posts', 'as' => 'posts.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPost = Permission::create(['name' => 'display_posts', 'display_name' => 'عرض مقال', 'display_name_en' => 'Show Blog', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.show', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePosts = Permission::create(['name' => 'update_posts', 'display_name' => 'تعديا مقال', 'display_name_en' => 'Update Blog', 'route' => 'posts/{posts}/edit', 'module' => 'posts', 'as' => 'posts.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPosts = Permission::create(['name' => 'delete_posts', 'display_name' => 'حذف المقال', 'display_name_en' => 'Delete Blog', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);


        // POSTS CATEGORIES
        $managePostCategories = Permission::create(['name' => 'manage_post_categories', 'display_name' => 'ادارة الاقسام', 'display_name_en' => 'categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '15',]);
        $managePostCategories->parent_show = $managePostCategories->id;
        $managePostCategories->save();
        $showPostCategories = Permission::create(['name' => 'show_post_categories', 'display_name' => 'ادارة الاقسام', 'display_name_en' => 'Categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '1', 'ordering' => '0',]);
        $createPostCategories = Permission::create(['name' => 'create_post_categories', 'display_name' => 'انشاء قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/create', 'module' => 'post_categories', 'as' => 'post_categories.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePostCategories = Permission::create(['name' => 'update_post_categories', 'display_name' => 'تعديل قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/{post_categories}/edit', 'module' => 'post_categories', 'as' => 'post_categories.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPostCategories = Permission::create(['name' => 'delete_post_categories', 'display_name' => 'حذف قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/{post_categories}', 'module' => 'post_categories', 'as' => 'post_categories.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);


        $manageContactUs = Permission::create(['name' => 'manage_contact_us', 'display_name' => 'تواصل معنا', 'display_name_en' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20',]);
        $manageContactUs->parent_show = $manageContactUs->id;
        $manageContactUs->save();
        $showContactUs = Permission::create(['name' => 'show_contact_us', 'display_name' => 'تواصل معنا', 'display_name_en' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '1', 'ordering' => '0',]);
        $displayContactUs = Permission::create(['name' => 'display_contact_us', 'display_name' => 'عرض الرسائل', 'display_name_en' => 'Display Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.show', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);
        $updateContactUs = Permission::create(['name' => 'update_contact_us', 'display_name' => 'تعديل الرسائل', 'display_name_en' => 'Update Message', 'route' => 'contact_us/{contact_us}/edit', 'module' => 'contact_us', 'as' => 'contact_us.edit', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyContactUs = Permission::create(['name' => 'delete_contact_us', 'display_name' => 'حذف الرسائل', 'display_name_en' => 'Delete Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.delete', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);

        $manageQuote = Permission::create(['name' => 'manage_Quote', 'display_name' => 'خدماتنا', 'display_name_en' => 'Get Quote', 'route' => 'Quote', 'module' => 'Quote', 'as' => 'Quote.index', 'icon' => 'fas fa-envelope', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20',]);
        $manageQuote->parent_show = $manageQuote->id;
        $manageQuote->save();
        $showQuote = Permission::create(['name' => 'show_Quote', 'display_name' => 'خدماتنا', 'display_name_en' => 'Quote', 'route' => 'Quote', 'module' => 'Quote', 'as' => 'Quote.index', 'icon' => 'fas fa-envelope', 'parent' => $manageQuote->id, 'parent_show' => $manageQuote->id, 'parent_original' => $manageQuote->id, 'appear' => '1', 'ordering' => '0',]);
        $displayQuote = Permission::create(['name' => 'display_Quote', 'display_name' => 'عرض الرسائل', 'display_name_en' => 'Display Message', 'route' => 'Quote/{Quote}', 'module' => 'Quote', 'as' => 'Quote.show', 'icon' => null, 'parent' => $manageQuote->id, 'parent_show' => $manageQuote->id, 'parent_original' => $manageQuote->id, 'appear' => '0', 'ordering' => '0',]);
        $updateQuote = Permission::create(['name' => 'update_Quote', 'display_name' => 'تعديل الرسائل', 'display_name_en' => 'Update Message', 'route' => 'Quote/{Quote}/edit', 'module' => 'Quote', 'as' => 'Quote.edit', 'icon' => null, 'parent' => $manageQuote->id, 'parent_show' => $manageQuote->id, 'parent_original' => $manageQuote->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyQuote = Permission::create(['name' => 'delete_Quote', 'display_name' => 'حذف الرسائل', 'display_name_en' => 'Delete Message', 'route' => 'Quote/{Quote}', 'module' => 'Quote', 'as' => 'Quote.delete', 'icon' => null, 'parent' => $manageQuote->id, 'parent_show' => $manageQuote->id, 'parent_original' => $manageQuote->id, 'appear' => '0', 'ordering' => '0',]);


        // USERS
        $manageUsers = Permission::create([
            'name' => 'manage_users',
            'display_name' => 'المستخدمين',
            'display_name_en' => 'Users',
            'route' => 'users',
            'module' => 'users',
            'as' => 'users.index',
            'icon' => 'fas fa-user',
            'parent' => '0',
            'parent_original' => '0',
            'appear' => '1',
            'ordering' => '20',
        ]);
        $manageUsers->parent_show = $manageUsers->id;
        $manageUsers->save();
        $showUsers = Permission::create(['name' => 'show_users', 'display_name' => 'المستخدمين', 'display_name_en' => 'Users', 'route' => 'users', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-user', 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '1', 'ordering' => '0',]);
        $createUsers = Permission::create(['name' => 'create_users', 'display_name' => 'انشاء مستخدم', 'display_name_en' => 'Create User', 'route' => 'users/create', 'module' => 'users', 'as' => 'users.create', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $displayUsers = Permission::create(['name' => 'display_users', 'display_name' => 'عرض مستخدم', 'display_name_en' => 'Show User', 'route' => 'users/{users}', 'module' => 'users', 'as' => 'users.show', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $updateUsers = Permission::create(['name' => 'update_users', 'display_name' => 'تعديل مستخدم', 'display_name_en' => 'Update User', 'route' => 'users/{users}/edit', 'module' => 'users', 'as' => 'users.edit', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyUsers = Permission::create([
            'name' => 'delete_users', 'display_name' => 'حذف مستخدم',
            'display_name_en' => 'Delete User', 'route' => 'users/{users}',
            'module' => 'users', 'as' => 'users.delete', 'icon' => null, 'parent' => $manageUsers->id,
            'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',
        ]);

        // USERS assign to editor
        $manageUsers_editor = Permission::create([
            'name' => 'manage_users_editor',
            'display_name' => 'العملاء',
            'display_name_en' => 'Clients',
            'route' => 'users_editor',
            'module' => 'users',
            'as' => 'users_editor.index',
            'icon' => 'fas fa-user',
            'parent' => '0',
            'parent_original' => '0',
            'appear' => '1',
            'ordering' => '22',
        ]);
        $manageUsers_editor->parent_show = $manageUsers_editor->id;
        $manageUsers_editor->save();
        $showUsers_editor = Permission::create(['name' => 'show_users_editor', 'display_name' => 'العملاء', 'display_name_en' => 'Clients', 'route' => 'users_editor', 'module' => 'users', 'as' => 'users_editor.index', 'icon' => 'fas fa-user', 'parent' => $manageUsers_editor->id, 'parent_show' => $manageUsers_editor->id, 'parent_original' => $manageUsers_editor->id, 'appear' => '1', 'ordering' => '0',]);
        $createUsers_editor = Permission::create(['name' => 'create_users_editor', 'display_name' => 'انشاء مستخدم', 'display_name_en' => 'Create User', 'route' => 'users_editor/create', 'module' => 'users', 'as' => 'users_editor.create', 'icon' => null, 'parent' => $manageUsers_editor->id, 'parent_show' => $manageUsers_editor->id, 'parent_original' => $manageUsers_editor->id, 'appear' => '0', 'ordering' => '0',]);
        $displayUsers_editor = Permission::create(['name' => 'display_users_editor', 'display_name' => 'عرض مستخدم', 'display_name_en' => 'Show User', 'route' => 'users_editor/{users_editor}', 'module' => 'users', 'as' => 'users_editor.show', 'icon' => null, 'parent' => $manageUsers_editor->id, 'parent_show' => $manageUsers_editor->id, 'parent_original' => $manageUsers_editor->id, 'appear' => '0', 'ordering' => '0',]);
        $updateUsers_editor = Permission::create(['name' => 'update_users_editor', 'display_name' => 'تعديل مستخدم', 'display_name_en' => 'Update User', 'route' => 'users_editor/{users_editor}/edit', 'module' => 'users', 'as' => 'users_editor.edit', 'icon' => null, 'parent' => $manageUsers_editor->id, 'parent_show' => $manageUsers_editor->id, 'parent_original' => $manageUsers_editor->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyUsers_editor = Permission::create([
            'name' => 'delete_users_editor', 'display_name' => 'حذف مستخدم',
            'display_name_en' => 'Delete User', 'route' => 'users_editor/{users_editor}',
            'module' => 'users', 'as' => 'users_editor.delete', 'icon' => null, 'parent' => $manageUsers_editor->id,
            'parent_show' => $manageUsers_editor->id, 'parent_original' => $manageUsers_editor->id, 'appear' => '0', 'ordering' => '0',
        ]);

        $manageStatus_Order = Permission::create([
            'name' => 'manage_status_order',
            'display_name' => 'ادارة حالة الطلبات',
            'display_name_en' => 'Status Orders',
            'route' => 'change-status',
            'module' => 'users',
            'as' => 'change-status',
            'icon' => 'fas fa-user',
            'parent' => '0',
            'parent_original' => '0',
            'appear' => '1',
            'ordering' => '21',
        ]);
        $manageStatus_Order->parent_show = $manageStatus_Order->id;
        $manageStatus_Order->save();
        // ROLES
        $manageRoles = Permission::create(['name' => 'manage_roles', 'display_name' => 'ادارة الادوار', 'display_name_en' => 'Roles', 'route' => 'roles', 'module' => 'roles', 'as' => 'roles.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '25',]);
        $manageRoles->parent_show = $manageRoles->id;
        $manageRoles->save();
        $showRoles = Permission::create(['name' => 'show_roles', 'display_name' => 'ادارة الادوار', 'display_name_en' => 'Roles', 'route' => 'roles', 'module' => 'roles', 'as' => 'roles.index', 'icon' => 'fas fa-user', 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '1', 'ordering' => '0',]);
        $createRoles = Permission::create(['name' => 'create_roles', 'display_name' => 'انشاء دور', 'display_name_en' => 'Create Role', 'route' => 'roles/create', 'module' => 'roles', 'as' => 'roles.create', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $displayRoles = Permission::create(['name' => 'display_roles', 'display_name' => 'عرض دور', 'display_name_en' => 'Show Role', 'route' => 'roles/{roles}', 'module' => 'roles', 'as' => 'roles.show', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $updateRoles = Permission::create(['name' => 'update_roles', 'display_name' => 'تعديل دور', 'display_name_en' => 'Update Role', 'route' => 'roles/{roles}/edit', 'module' => 'roles', 'as' => 'roles.edit', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyRoles = Permission::create(['name' => 'delete_roles', 'display_name' => 'حذف دور', 'display_name_en' => 'Delete Role', 'route' => 'roles/{roles}', 'module' => 'roles', 'as' => 'roles.delete', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);

        // PERMISSIONS
        $managePermissions = Permission::create(['name' => 'manage_permissions', 'display_name' => 'ادارة الصلاحيات', 'display_name_en' => 'Permissions', 'route' => 'permissions', 'module' => 'permissions', 'as' => 'permissions.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '30',]);
        $managePermissions->parent_show = $managePermissions->id;
        $managePermissions->save();
        $showPermissions = Permission::create(['name' => 'show_permissions', 'display_name' => 'ادارة الصلاحيات', 'display_name_en' => 'permissions', 'route' => 'permissions', 'module' => 'permissions', 'as' => 'permissions.index', 'icon' => 'fas fa-user', 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '1', 'ordering' => '0',]);
        $createPermissions = Permission::create(['name' => 'create_permissions', 'display_name' => 'انشاء صلاحية', 'display_name_en' => 'Create Permission', 'route' => 'permissions/create', 'module' => 'permissions', 'as' => 'permissions.create', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPermissions = Permission::create(['name' => 'display_permissions', 'display_name' => 'عرض صلاحية', 'display_name_en' => 'Show Permission', 'route' => 'permissions/{permissions}', 'module' => 'permissions', 'as' => 'permissions.show', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePermissions = Permission::create(['name' => 'update_permissions', 'display_name' => 'تعديل صلاحية', 'display_name_en' => 'Update Permission', 'route' => 'permissions/{permissions}/edit', 'module' => 'permissions', 'as' => 'permissions.edit', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPermissions = Permission::create(['name' => 'delete_permissions', 'display_name' => 'حذف صلاحية', 'display_name_en' => 'Delete Permission', 'route' => 'permissions/{permissions}', 'module' => 'permissions', 'as' => 'permissions.delete', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);


        // EDITORS
        // SUPERVISORS
        $manageSupervisors = Permission::create(['name' => 'manage_supervisors', 'display_name' => 'المشرفون', 'display_name_en' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => '0', 'parent_original' => '0', 'appear' => '0', 'ordering' => '700', 'sidebar_link' => '0']);
        $manageSupervisors->parent_show = $manageSupervisors->id;
        $manageSupervisors->save();
        $showSupervisors = Permission::create(['name' => 'show_supervisors', 'display_name' => 'المشرفون', 'display_name_en' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '1', 'ordering' => '0', 'sidebar_link' => '0']);
        $createSupervisors = Permission::create(['name' => 'create_supervisors', 'display_name' => 'انشاء مشرف', 'display_name_en' => 'Create Supervisor', 'route' => 'supervisor/create', 'module' => 'supervisor', 'as' => 'supervisor.create', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $displaySupervisors = Permission::create(['name' => 'display_supervisors', 'display_name' => 'عرض مشرف', 'display_name_en' => 'Show Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.show', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $updateSupervisors = Permission::create(['name' => 'update_supervisors', 'display_name' => 'تعديل مشرف', 'display_name_en' => 'Update Supervisor', 'route' => 'supervisor/{supervisor}/edit', 'module' => 'supervisor', 'as' => 'supervisor.edit', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $destroySupervisors = Permission::create(['name' => 'delete_supervisors', 'display_name' => 'حذف مشرف', 'display_name_en' => 'Delete Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.delete', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
    }
}
