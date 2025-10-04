public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->unique()->after('email');
        $table->string('cccd_front')->nullable()->after('phone');
        $table->string('cccd_back')->nullable()->after('cccd_front');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['phone', 'cccd_front', 'cccd_back']);
    });
}
