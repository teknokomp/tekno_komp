<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function pest\Laravel\{actingAs, get};
use App\Models\User;
use App\Models\Categories;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


test('admin user can access product categories page', function () {
    $admin = User::factory()->create();
    actingAs($admin)
        ->get('/dashboard/categories')
        ->assertStatus(200)
        ->assertSee('Product Categories'); // Assuming the page contains this text
});


test('admin user can create new product categories', function () {
    $admin = User::factory()->create();
    actingAs($admin)
        ->get('/dashboard/categories/create')
        ->assertStatus(200)
        ->assertSee('Product Categories');
    $newCategori = [
        'name' => 'Testing New Category',
        'slug' => 'testing new-category',
        'description' => 'This is a new testing category.'
    ];
    actingAs($admin)
        ->post('/dashboard/categories', $newCategori)
        ->assertRedirect();
    $latestCategory = Categories::latest('id')->first();

    expect($latestCategory)
        ->name->toBe($newCategori['name'])
        ->slug->toBe($newCategori['slug'])
        ->description->toBe($newCategori['description']);
});


test('admin user can update product categories', function () {
    $admin = User::factory()->create();
    $category = Categories::factory()->create();
    actingAs($admin)
        ->get('/dashboard/categories/' . $category->id . '/edit')
        ->assertStatus(200)
        ->assertSee('Product Categories');
    $updatedCategory = [
        'name' => 'Updated Category Name',
        'slug' => 'updated-category-name',
        'description' => 'This is an updated category description.'
    ];
    actingAs($admin)
        ->put('/dashboard/categories/' . $category->id, $updatedCategory)
        ->assertRedirect();
    $category->refresh();
    expect($category)
        ->name->toBe($updatedCategory['name'])
        ->slug->toBe($updatedCategory['slug'])
        ->description->toBe($updatedCategory['description']);
});


test('admin user can delete product categories', function () {
    $admin = User::factory()->create();
    $category = Categories::factory()->create();
    actingAs($admin)
    ->delete('/dashboard/categories/' . $category->id)
    ->assertRedirect();
    expect(Categories::find($category->id))->toBeNull();
   });